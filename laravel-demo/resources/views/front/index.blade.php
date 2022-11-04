@extends('front.layout.master')

@section('title', 'Home')

@section('body')
<!--Hero Section Begin -->
<section class="hero-section">
  <div class="hero-items owl-carousel">
    <div class="single-hero-items set-bg" data-setbg="front/img/hero-1.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <span>Bag,kids</span>
            <h1>Black Friday</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, fugit aliquam unde id recusandae aspernatur accusantium labore odio. Deleniti impedit ratione in cupiditate debitis quis est voluptatibus officiis iure dolore?</p>
            <a href="#" class="primary-btn">Show Now</a>
          </div>
        </div>
        <div class=off-card>
          <h2>Sales<span>50%</span></h2>
        </div>
      </div>
    </div>
    <div class="single-hero-items set-bg" data-setbg="front/img/hero-2.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <span>Bag,kids</span>
            <h1>Black Friday</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, fugit aliquam unde id recusandae aspernatur accusantium labore odio. Deleniti impedit ratione in cupiditate debitis quis est voluptatibus officiis iure dolore?</p>
            <a href="#" class="primary-btn">Show Now</a>
          </div>
        </div>
        <div class=off-card>
          <h2>Sales<span>50%</span></h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Hero Section End -->

<!--Banner Section Begin  -->
<div class="banner-section spad">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <div class="single-banner">
          <img src="front/img/banner-1.jpg" alt="">
          <div class="inner-text">
            <h4>Men's</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="single-banner">
          <img src="front/img/banner-2.jpg" alt="">
          <div class="inner-text">
            <h4>Women's</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="single-banner">
          <img src="front/img/banner-3.jpg" alt="">
          <div class="inner-text">
            <h4>Kid's</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Banner Section End  -->

<!-- SmartPhone Section Begin -->
<section class="women-banner spad">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3">
        <div class="product-large set-bg" data-setbg="front/img/products/women-large.jpg">
          <h2>Apple</h2>
          <a href="#">Discover More</a>
        </div>
      </div>
      <div class="col-lg-8 offset-lg-1">
        <div class="filter-control">
          <ul>
            <li class="active item" data-tag="*" data-category="SmartPhone">All</li>
            <li class="item" data-tag=".Apple" data-category="SmartPhone">Apple</li>
            <li class="item" data-tag=".SamSung" data-category="SmartPhone">SamSung</li>
            <li class="item" data-tag=".Oppo" data-category="SmartPhone">Oppo</li>
            <li class="item" data-tag=".Xiaomi" data-category="SmartPhone">Xiaomi</li>
          </ul>
        </div>
        <div class="product-slider owl-carousel SmartPhone">
          @foreach ($featuredProducts['SmartPhone'] as $product)
            @include('front.components.product-item')
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<!-- SmartPhone Section End -->

<!-- Deal Of The Week Section Begin -->
<section class="deal-of-week set-bg spad" data-setbg="front/img/time-bg.jpg">
  <div class="container">
    <div class="col-lg-6 text-center">
      <div class="section-title">
        <h2>Deal Of The Week</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem impedit repellat sequi! Earum necessitatibus libero voluptatem. Necessitatibus sequi porro quibusdam optio laborum culpa. Perferendis provident nobis, aliquam laborum ipsa
          voluptas.
        </p>
        <div class="product-price">
          $35.00
          <span>/ HanBag</span>
        </div>
      </div>
      <div class="countdown-timer" id="countdown">
        <div class="cd-item">
          <span>56</span>
          <p>Days</p>
        </div>
        <div class="cd-item">
          <span>12</span>
          <p>Hrs</p>
        </div>
        <div class="cd-item">
          <span>40</span>
          <p>Mins</p>
        </div>
        <div class="cd-item">
          <span>52</span>
          <p>Secs</p>
        </div>
      </div>
      <a href="" class="primary-btn">Show Now </a>
    </div>
  </div>
</section>
<!-- Deal Of The Week Section End -->

<!-- Laptop Section Begin -->
<section class="man-banner spad">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="filter-control">
          <ul>
            <li class="active">Clothings</li>
            <li>HandBag</li>
            <li>Shoes</li>
            <li>Accessories</li>
          </ul>
        </div>
        <div class="product-slider owl-carousel">
          @foreach ($featuredProducts['Laptop'] as $product)
            @include('front.components.product-item')
          @endforeach
        </div>
      </div>
      <div class="col-lg-3 offset-lg-1">
        <div class="product-large set-bg" data-setbg="front/img/products/man-large.jpg">
          <h2>Laptop</h2>
          <a href="#">Discover More</a>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- Laptop Section End -->

<!-- SmartWatch Section Begin -->
<section class="man-banner spad">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="filter-control">
          <ul>
            <li class="active">Clothings</li>
            <li>HandBag</li>
            <li>Shoes</li>
            <li>Accessories</li>
          </ul>
        </div>
        <div class="product-slider owl-carousel">
          @foreach ($featuredProducts['SmartWatch'] as $product)
            @include('front.components.product-item')
          @endforeach
        </div>
      </div>
      <div class="col-lg-3 offset-lg-1">
        <div class="product-large set-bg" data-setbg="front/img/products/man-large.jpg">
          <h2>Laptop</h2>
          <a href="#">Discover More</a>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- SmartWatch Section End -->

<!-- HeadPhone Section Begin -->
<section class="man-banner spad">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="filter-control">
          <ul>
            <li class="active">Clothings</li>
            <li>HandBag</li>
            <li>Shoes</li>
            <li>Accessories</li>
          </ul>
        </div>
        <div class="product-slider owl-carousel">
          @foreach ($featuredProducts['HeadPhone'] as $product)
            @include('front.components.product-item')
          @endforeach
        </div>
      </div>
      <div class="col-lg-3 offset-lg-1">
        <div class="product-large set-bg" data-setbg="front/img/products/man-large.jpg">
          <h2>Laptop</h2>
          <a href="#">Discover More</a>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- HeadPhone Section End -->

<!-- Accessory Section Begin -->
<section class="man-banner spad">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="filter-control">
          <ul>
            <li class="active">Clothings</li>
            <li>HandBag</li>
            <li>Shoes</li>
            <li>Accessories</li>
          </ul>
        </div>
        <div class="product-slider owl-carousel">
          @foreach ($featuredProducts['Accessory'] as $product)
            @include('front.components.product-item')
          @endforeach
        </div>
      </div>
      <div class="col-lg-3 offset-lg-1">
        <div class="product-large set-bg" data-setbg="front/img/products/man-large.jpg">
          <h2>Laptop</h2>
          <a href="#">Discover More</a>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- Accessory Section End -->

<!-- Instagram Section Begin -->
<div class="instagram-photo">
  <div class="insta-item set-bg" data-setbg="front/img/insta-1.jpg">
    <div class="inside-text">
      <i class="ti-instagram"></i>
      <h5>
        <a href="#">ElectronicStore_Collection</a>
      </h5>
    </div>
  </div>
  <div class="insta-item set-bg" data-setbg="front/img/insta-2.jpg">
    <div class="inside-text">
      <i class="ti-instagram"></i>
      <h5>
        <a href="#">ElectronicStore_Collection</a>
      </h5>
    </div>
  </div>
  <div class="insta-item set-bg" data-setbg="front/img/insta-3.jpg">
    <div class="inside-text">
      <i class="ti-instagram"></i>
      <h5>
        <a href="#">ElectronicStore_Collection</a>
      </h5>
    </div>
  </div>
  <div class="insta-item set-bg" data-setbg="front/img/insta-4.jpg">
    <div class="inside-text">
      <i class="ti-instagram"></i>
      <h5>
        <a href="#">ElectronicStore_Collection</a>
      </h5>
    </div>
  </div>
  <div class="insta-item set-bg" data-setbg="front/img/insta-5.jpg">
    <div class="inside-text">
      <i class="ti-instagram"></i>
      <h5>
        <a href="#">ElectronicStore_Collection</a>
      </h5>
    </div>
  </div>
  <div class="insta-item set-bg" data-setbg="front/img/insta-6.jpg">
    <div class="inside-text">
      <i class="ti-instagram"></i>
      <h5>
        <a href="#">ElectronicStore_Collection</a>
      </h5>
    </div>
  </div>
</div>
<!-- Instagram Section End -->

<!-- Latest Blog Section Begin -->
<section class="latest-blog spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <h2>From The Blog</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="single-latest-blog">
          <img src="front/img/latest-1.jpg" alt="">
          <div class="latest-text">
            <div class="tag-list">
              <div class="tag-item">
                <i class="fa fa-calendar-o"></i> December 20,2022
              </div>
              <div class="tag-item">
                <i class="fa fa-comment-o"></i> 5
              </div>
            </div>
            <a href="">
              <h4>The Best ....</h4>
            </a>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="single-latest-blog">
          <img src="front/img/latest-3.jpg" alt="">
          <div class="latest-text">
            <div class="tag-list">
              <div class="tag-item">
                <i class="fa fa-calendar-o"></i> December 20,2022
              </div>
              <div class="tag-item">
                <i class="fa fa-comment-o"></i> 5
              </div>
            </div>
            <a href="">
              <h4>The Best ....</h4>
            </a>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="single-latest-blog">
          <img src="front/img/latest-2.jpg" alt="">
          <div class="latest-text">
            <div class="tag-list">
              <div class="tag-item">
                <i class="fa fa-calendar-o"></i> December 20,2022
              </div>
              <div class="tag-item">
                <i class="fa fa-comment-o"></i> 5
              </div>
            </div>
            <a href="">
              <h4>The Best ....</h4>
            </a>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="benefit-items">
      <div class="row">
        <div class="col-lg-4">
          <div class="single-benefit">
            <div class="sb-icon">
              <img src="front/img/icon-1.png" alt="">
            </div>
            <div class="sb-text">
              <h6>FREE SHIPPING</h6>
              <p>For all order over 99$</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="single-benefit">
            <div class="sb-icon">
              <img src="front/img/icon-2.png" alt="">
            </div>
            <div class="sb-text">
              <h6>DELIVERY ON TIME</h6>
              <p>If good have problems</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="single-benefit">
            <div class="sb-icon">
              <img src="front/img/icon-3.png" alt="">
            </div>
            <div class="sb-text">
              <h6>SECURE PAYMENT</h6>
              <p>100% secure payment</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Latest Blog Section End -->
@endsection