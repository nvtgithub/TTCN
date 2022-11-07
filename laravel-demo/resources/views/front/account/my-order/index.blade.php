@extends('front.layout.master')

@section('title', 'My Order')

@section('body')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home">Trang chủ</i></a>
                        <span>Đơn hàng của tôi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- My Order Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Id</th>
                                    <th>Sản phẩm</th>
                                    <th>Tổng tiền</th>
                                    <th>Chi tiết sản phẩm</th>       
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cart-pic first-row"><img style="max-width: 100px;" src="front/img/cart-page/product-1.jpg" alt=""></td>
                                    <td class="first-row">01</td>
                                    <td class="cart-title first-row">
                                        <h5>Pure Pineapple, and 3 orther product</h5>
                                    </td>
                                    <td class="total-price first-row">$60.00</td>
                                    <td class="first-row">
                                        <a class="btn" href="./my-order-detail.html">Details</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection