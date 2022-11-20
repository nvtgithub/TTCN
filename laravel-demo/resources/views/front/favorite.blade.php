@extends('front.layout.master')

@section('title', 'Favorite')

@section('body')
    <!-- -->
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-text">
            <a href="#"><i class="fa fa-home">Home</i></a>
            <span>Sản phẩm yêu thích</span>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- Breadcrumb Section End -->
    <!-- Shopping Cart Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="product-list">
                <div class="row" id="favorite">
                
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
    
@endsection