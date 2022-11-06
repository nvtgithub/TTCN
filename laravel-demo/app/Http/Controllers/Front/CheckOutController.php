<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailService;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;

    public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index() 
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request)
    {
        //01. Thêm đơn hàng 
        $order =  $this->orderService->create($request->all());

        //02. Thêm chi tiết đơn hàng
        $carts = Cart::content(); 

        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'total' => $cart->qty * $cart->price,
            ];

            $this->orderDetailService->create($data);
        }

        if($request->payment_type == 'pay_later') 
        {
            //Gửi email:
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendEmail($order, $total, $subtotal); //gọi hàm xử lý email đã định nghĩa

            //03. Xóa giỏ hàng
            Cart::destroy();

            //04. Trả về kết quả thông báo
            return redirect('checkout/result')
                ->with('notification', 'Success! You will pay on delivery. Please check your email.');
        }

        if($request->payment_type == 'online_payment') {
            //01. Lấy URL thanh toán VNPay
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id, //ID của đơn hàng
                'vnp_OrderInfo' => '',
                'vnp_Amount' => Cart::total(0, '', ''), //Tổng giá của đơn hàng
            ]);

            //02. CHuyển hướng tới URL lấy được
            return redirect()->to($data_url);
        }  
    }

    public function vnPayCheck(Request $request) 
    {
        //01. Lấy data từ URL (do VNPay gửi về qua $vnp_Returnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); //Mã phản hồi kết quả thanh toán. 00= thành công
        $vnp_TxnRef = $request->get('vnp_TxnRef'); //order_id
        $vnp_Amount = $request->get('vnp_Amount'); //Số tiền thanh toán

        //02. Kiểm tra data, xem kết quả giáo dịch trả về từ VNPay hợp lệ không:
        if($vnp_ResponseCode != null )
        {
            //Nếu kết quả thành công:
            if($vnp_ResponseCode == 00)
            {
                //Gửi email:
                $order = $this->orderService->find($vnp_TxnRef);
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendEmail($order, $total, $subtotal); //gọi hàm xử lý email đã định nghĩa

                //Xóa giỏ hàng
                Cart::destroy();
                
                //Thông báo kết quả
                return redirect('checkout/result')->with('notification', 'Success! Has paid online. Please check your email.');
            } else {
                //Nếu không thành công
                //Xóa đơn hàng dã thêm vào database
                $this->orderService->delete($vnp_TxnRef);

                //Thông báo lỗi
                return redirect('checkout/result')->with('notification', 'ERROR! Payment failed or canceled.');
            }
        }
    }

    public function result()
    {
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }

    public function sendEmail($order, $total, $subtotal)
    {
        $email_to = $order->email;

        Mail::send('front.checkout.email', compact('order', 'total', 'subtotal'), 
            function ($message) use ($email_to)
            {
                $message->from('minhthinh06112001@gmail.com', 'Electronicstore');
                $message->to($email_to, $email_to);
                $message->subject('Thông báo đặt hàng');
            }
        );

    }
}
