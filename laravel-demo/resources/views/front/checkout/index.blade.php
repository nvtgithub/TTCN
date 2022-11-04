@extends('front.layout.master')

@section('title', 'Cart')

@section('body')
    <!-- Shopping Cart Section Begin -->
    <div class="checkout-section spad">
        <div class="container">
            <form action="" method="post" class="checkout-form">
            @csrf    
            <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="login.html" class="content-btn">Click Here To Login</a>
                        </div>
                        <h4>Billing Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name <span>*</span></label>
                                <input name="first_name" type="text" id="fir">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name <span>*</span></label>
                                <input name="last_name" type="text" id="last">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Company Name</label>
                                <input name="company_name" type="text" id="cun-name">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Country <span>*</span></label>
                                <input name="country" type="text" id="cun">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address <span>*</span></label>
                                <input name="street_address" type="text" id="street" class="street-first">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Postcode / ZIP (Optional)/label>
                                <input name="postcode_zip" type="text" id="zip">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / City <span>*</span></label>
                                <input name="town_city" type="text" id="town">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address <span>*</span></label>
                                <input name="email" type="text" id="email">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone <span>*</span></label>
                                <input name="phone" type="text" id="phone">
                            </div>
                            <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Create an account?
                                        <input type="checkbox"  id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Codes">
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>

                                    @foreach($carts as $cart)
                                        <li class="fw-normal">
                                            {{ $cart->name }} x {{ $cart->qty }}
                                            <span>{{ $cart->price * $cart->qty }} VNĐ</span>
                                        </li>
                                    @endforeach
                                    <li class="fw-normal">Subtotal <span>{{ $subtotal }} VNĐ</span></li>
                                    <li class="total-price">Total <span>{{ $total }} VNĐ</span></li>
                                </ul>

                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Pay later
                                            <input name="payment_type" value="pay_later" type="radio"  id="pc-check" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-payal">
                                            Online payment
                                            <input name="payment_type" value="online_payment" type="radio"  id="pc-payal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Shopping Cart Section End -->
@endsection