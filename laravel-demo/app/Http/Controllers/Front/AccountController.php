<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Order\OrderService;
use App\Services\User\UserServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AccountController extends Controller
{
  private $userService;
  private $orderService;
  private $productCategoryService;

  public function __construct(UserServiceInterface $userService, OrderService $orderService, ProductCategoryServiceInterface $productCategoryService)
  {
    $this->userService = $userService;
    $this->orderService = $orderService;
    $this->productCategoryService = $productCategoryService;
  }

  public function login()
  {
    $categories = $this->productCategoryService->all();
    return view('front.account.login', compact('categories'));
  }

  public function checkLogin(Request $request)
  {
    $credentials = [
      'email' => $request->email,
      'password' => $request->password,
      'level' => Constant::user_level_client, //Tài khoản cắp độ khách hàng bình thường
    ];

    $remember = $request->remember;

    if (Auth::attempt($credentials, $remember)) {
      //return redirect('');
      return redirect()->intended(''); //Mặc định là : trnag chủ
    } else {
      return back()->with('notification', 'Đăng nhập thất bại: Email hoặc mật khẩu không chính xác');
    }
  }

  public function logout()
  {
    Auth::logout();

    return back();
  }

  public function register()
  {
    $categories = $this->productCategoryService->all();
    return view('front.account.register', compact('categories'));
  }

  public function postRegister(Request $request)
  {
    if ($request->password != $request->password_confirmation) {
      return back()->with('notification', 'Lỗi: Mật khẩu không khớp!');
    }

    $data = [
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'level' => Constant::user_level_client, //đăng ký tài khoản cấp khác hàng bình thường
    ];

    $this->userService->create($data);

    return redirect('account/login')->with('notification', 'Đăng ký thành công!');
  }

  public function myOrderIndex()
  {
    $orders = $this->orderService->getOrderByUserId(Auth::id());
    $categories = $this->productCategoryService->all();

    return view('front.account.my-order.index', compact('orders', 'categories'));
  }

  public function myOrderShow($id)
  {
    $order = $this->orderService->find($id);
    $categories = $this->productCategoryService->all();

    return view('front.account.my-order.show', compact('order', 'categories'));
  }

  public function forgotpassword()
  {
    $categories = $this->productCategoryService->all();
    return view('front.account.forgot_password', compact('categories'));
  }

  public function sendemail(Request $request)
  {
    $data = $request->all();
    
    $customer = User::where('email',$data['email_account'])->get();
    $title_email = "Lấy lại mật khẩu";
    foreach ($customer as $key => $value) {
      $customer_id = $value -> id;
    }

    if ($customer) {
      $count_customer = $customer->count();
      if ($count_customer == 0) {
        return back()->with('error','Email không tồn tại!');
      }
      else {
        $token_random = Str::random(6);
        $customer = User::find($customer_id);
        $customer->user_token = $token_random;
        $customer->save();
        $categories = $this->productCategoryService->all();

        $toEmail = $data['email_account'];
        // $link_reset_pass = url('/update_new_pass?email='.$toEmail.'$token='.$token_random);
        $link_reset_pass = 'helo';

        $data = array('name' => $title_email, 'body' => $link_reset_pass, 'email' => $data['email_account'] );

        Mail::send(
        'front.account.forgot_pass_notify',
         compact('categories'), 
         function ($message) use ($title_email,$data) {
            $message->from('electronicstorek64cnpm@gmail.com',$title_email);
            $message->to($data['email']);
            $message->subject($title_email);
        });
        return redirect()->back()->with('message','Gửi Email thành công! Vui lòng vào email để reset mật khẩu');
      }
    }
  }
}
