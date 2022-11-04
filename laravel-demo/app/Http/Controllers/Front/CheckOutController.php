<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index() 
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder()
    {
        //01. Thêm đơn hàng 
        

        //02. Thêm chi tiết đơn hàng

        //03. Xóa giỏ hàng

        //04. Trả về kết quả thông báo
    }
}
