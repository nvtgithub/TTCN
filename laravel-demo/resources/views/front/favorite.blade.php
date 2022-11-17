@extends('front.layout.master')

@section('title', 'Favorite')

@section('body')
    <!-- Shopping Cart Section Begin -->
    <div class="shopping-cart spad">
        <div class="container">
            <div class="row">
                    <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th class="p-name text-center">Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Chi tiết</th>
                                    <th>
                                        <i onclick="if(confirm('Bạn có muốn xóa các sản phẩm đã yêu thích?') === true) 
                                        {
                                            localStorage.removeItem('data');
                                            location.reload();
                                        }" class="ti-close"
                                        ></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="row_wishlist">
                                                            
                            </tbody>
                        </table>
                    </div>              
                    </div>
            </div>
        </div>
    </div>
    <!-- Shopping Cart Section End -->
    
@endsection