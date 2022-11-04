<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailService;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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
            //03. Xóa giỏ hàng
            Cart::destroy();

            //04. Trả về kết quả thông báo
            return redirect('checkout/result')->with('notification', 'Success! You will pay on delivery. Please check your email.');
        }

        if($request->payment_type == 'online_payment') {
            //01. Lấy URL thanh toán VNPay
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TnxRef' => $order->id, //ID của đơn hàng
                'vnp_OrderInfor' => 'Mổ tả đơn hàng ở đây ...',
                'vnp_Amount' => Cart::total(0, '',''), //Tổng giá của đơn hàng
            ]);

            //02. CHuyển hướng tới URL lấy được
            return redirect()->to($data_url);
        } 

    }

    public function result()
    {
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }
}
