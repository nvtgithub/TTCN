<!DOCTYPE html>
<html lang="zxx">

<head>
  <base href="{{asset('/')}}">
  <meta charset="UTF-8">
  <meta name="description" content="codelean Template">
  <meta name="keywords" content="codelean, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title') | ElectronicStore</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
  <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="front/css/style.css" type="text/css">
</head>

<body>
  <!-- Messenger Plugin chat Code -->
  {{-- <div id="fb-root"></div> --}}

  <!-- Your Plugin chat code -->
  {{-- <div id="fb-customer-chat" class="fb-customerchat">
  </div>

  <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "104702632486616");
    chatbox.setAttribute("attribution", "biz_inbox");
  </script> --}}

  <!-- Your SDK code -->
  {{-- <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml: true,
        version: 'v15.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script> --}}

  <!-- Start coding here -->
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"> </div>
  </div>

  <!-- Header Section Begin -->
  <header class="header-section">
    <div class="header-top">
      <div class="container">
        <div class="ht-left">
          <div class="mail-service">
            <i class="fa fa-envelope ">
              electronicstorek64cnpm@gmail.com</i>
          </div>
          <div class="phone-service">
            <i class="fa fa-phone"><span class="ml-2">0865892696</span> </i>
          </div>
        </div>

        <div class="ht-right">

          @if(Auth::check())
          <a href="./account/logout" class="login-panel">
            <i class="fa fa-user"></i>
            {{ Auth::user()->name}} - ????ng xu???t
          </a>
          @else
          <a href="./account/login" class="login-panel"><i class="fa fa-user"></i>????ng nh???p</a>
          @endif


          <div class="lan-selector d-none">
            <select class="language_drop" name="countries" id="countries" style="width:300px;">
              <option value='yt' data-image="front/img/flag-1.jpg" data-imagecss="flag yt" data-title="English">English</option>
              <option value='yu' data-image="front/img/flag-2.jpg" data-imagecss="flag yu" data-title="English">German</option>
            </select>
          </div>
          <div class="top-social">
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-twitter-alt"></i></a>
            <a href="#"><i class="ti-linkedin"></i></a>
            <a href="#"><i class="ti-pinterest"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class=container>
      <div class="inner-header">
        <div class="row">
          <div class="col-lg-2 col-md-2">
            <div class="logo">
              <a href="/">
                <img src="front/img/logo-02.png" height="30" alt="">
              </a>
            </div>
          </div>
          <div class="col-lg-7 col-md-7">
            <form action="shop">
              <div class="advanced-search">
                <button type="button" class="category-btn d-none">Lo???i s???n ph???m</button>
                <div class="input-group">
                  <input name="search" value="{{request('search')}}" type="text" placeholder="T??m ki???m">
                  <button type="submit"><i class="ti-search"></i></button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-3 col-md-3 text-right">
            <ul class="nav-right">
              <li class="heart-icon cart-icon">
                <a href="./favorite">
                  <i class="icon_heart_alt"></i>
                  <span id="product_favorite_count"></span>
                </a>
                <div class="cart-hover">
                  <div class="select-item" style="max-height: 250px; overflow-y: scroll;">
                    <table>
                      <tbody id="show_product_favorite">

                      </tbody>
                    </table>
                  </div>
                </div>
              </li>
              <li class="cart-icon">
                <a href="./cart">
                  <i class="icon_bag_alt"></i>
                  <span class="cart-count">{{ Cart::count() }}</span>
                </a>
                <div class="cart-hover">
                  <div class="select-items">
                    <table>
                      <tbody>
                        @foreach(Cart::content() as $cart)
                        <tr data-rowId="{{ $cart->rowId }}">
                          <td class="si-pic"><img width="70px" src="front/img/products/{{ $cart->options->images[0]->path }}" alt=""></td>
                          <td class="si-text">
                            <div class="product-selected">
                              <h6 class="text-truncate">{{ $cart->name }} <span> - {{$cart->options['colorProduct']->color}} </span></h6>
                              <p>{{ number_format($cart->price) }} VN?? x {{ $cart->qty }}</p>
                            </div>
                          </td>
                          <td class="si-close">
                            <i onclick="removeCart('{{ $cart->rowId }}', '{{ $cart->name }}')" class="ti-close"></i>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="select-total">
                    <span>total:</span>
                    <h5>{{ Cart::total() }} VN??</h5>
                  </div>
                  <div class="select-button">
                    <a href="./cart" class="primary-btn view-card">Xem gi??? h??ng </a>
                    <a href="./checkout" class="primary-btn check-out">Thanh to??n</a>
                  </div>
                </div>
              </li>
              <li class="cart-price">{{ Cart::total() }} VN??</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="nav-item">
      <div class="container">
        <div class="nav-depart">
          <div class="depart-btn">
            <i class="ti-menu"></i>
            <span>C??c m???t h??ng</span>
            <ul class="depart-hover">
              @foreach($categories as $category)
              <li><a href="shop/category/{{ $category->name }}">{{ $category->name }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <nav class="nav-menu mobile-menu">
          <ul>
            <li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="./">Trang ch???</a></li>
            <li class="{{ (request()->segment(1) == 'shop') ? 'active' : '' }}"><a href="./shop">Shop</a></li>
            <li><a>Trang</a>
              <ul class="dropdown">
                <li><a href="./account/my-order">????n h??ng c???a t??i</a></li>
                <li><a href="./account/my-contact/contactuser/{{ Auth::user()->id ?? '' }}">Th??ng tin c?? nh??n</a></li>
                <li><a href="./checkout">Thanh to??n</a></li>
                <li><a href="account/register">????ng k??</a></li>
              </ul>
            </li>
            <li class="{{ (request()->segment(1) == 'contact') ? 'active' : '' }}"><a href="./contact">Li??n h???</a></li>
          </ul>
        </nav>
        <div id="mobile-menu-wrap">

        </div>
      </div>
    </div>
  </header>
  <!-- Header Section End -->

  <!-- --Body here-- -->
  @yield('body')


  <!-- Parter Logo Section Begin -->
  <div class="partner-logos">
    <div class="contain er">
      <div class="logo-carousels">
        <div class="logo-items">
          <div class="tablecell-inner">
            <img src="front/img/logo-carousel/logo-1.png" alt="">
          </div>
        </div>
        <div class="logo-items">
          <div class="tablecell-inner">
            <img src="front/img/logo-carousel/logo-2.png" alt="">
          </div>
        </div>
        <div class="logo-items">
          <div class="tablecell-inner">
            <img src="front/img/logo-carousel/logo-3.png" alt="">
          </div>
        </div>
        <div class="logo-items">
          <div class="tablecell-inner">
            <img src="front/img/logo-carousel/logo-4.png" alt="">
          </div>
        </div>
        <div class="logo-items">
          <div class="tablecell-inner">
            <img src="front/img/logo-carousel/logo-5.png" alt="">
          </div>
        </div>
        <div class="logo-items">
          <div class="tablecell-inner">
            <img src="front/img/logo-carousel/logo-6.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Parter Logo Section End -->

  <!-- Footer Section Begin -->
  <footer class="footer-section">
    <div class=container>
      <div class="row">
        <div class="col-lg-3">
          <div class="footer-left">
            <div class="footer-logo">
              <a href="index.html">
                <img src="front/img/logo-02.png" height="25" alt="">
              </a>
            </div>
            <ul>
              <li>?????a ch???: Tr??u Q??y, Gia L??m, H?? N???i</li>
              <li>S??? ??i???n tho???i: +84 865.892.696</li>
              <li>Email: electronicstorek64cnpm@gmail.com</li>
            </ul>
            <div class="footer-social">
              <a href=""><i class="fa fa-facebook"></i></a>
              <a href=""><i class="fa fa-instagram"></i></a>
              <a href=""><i class="fa fa-twitter"></i></a>
              <a href=""><i class="fa fa-pinterest"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 offset-lg-1">
          <div class="footer-widget">
            <h5>Danh m???c</h5>
            <ul>
              @foreach($categories as $category)
              <li><a href="shop/category/{{ $category->name }}">{{ $category->name }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="footer-widget">
            <h5>Ti???n ??ch</h5>
            <ul>
              <li><a href="/shop">Shop</a></li>
              <li><a href="/account/login">????ng nh???p</a></li>
              <li><a href="/account/register">????ng k??</a></li>
              <li><a href="/cart">Gi??? h??ng</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- Map Section Begin -->
          <div class="map spad">
            <div class="container">
              <div class="map-inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14898.414840214122!2d105.92858623003993!3d21.008516807558404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a8cfa8c9b137%3A0xd8bc142d32495692!2zVHLDonUgUXXhu7MsIEdpYSBMw6JtLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1669215289641!5m2!1svi!2s" height="610 " style="border:0; " allowfullscreen=" " loading="lazy " referrerpolicy="no-referrer-when-downgrade ">
                </iframe>
                <div class="icon d-none">
                  <i class="fa fa-map-marker"></i>
                </div>
              </div>
            </div>
          </div>
          <!-- Map Section End -->
        </div>
      </div>
    </div>
    <div class="copyright-reserved">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="copyright-text">??2022 ???????c thi???t k??? b???i: <i class="fa fa-heart-o" aria-hidden="true"></i> Ngoc Anh, Nguyen Tien, Minh Thinh, Quang Huy</div>
            <div class="payment-pic">
              <img src="front/img/payment-method.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Js Plugins -->
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <script src="front/js/jquery-3.3.1.min.js"></script>
  <script src="front/js/bootstrap.min.js"></script>
  <script src="front/js/jquery-ui.min.js"></script>
  <script src="front/js/jquery.countdown.min.js"></script>
  <script src="front/js/jquery.nice-select.min.js"></script>
  <script src="front/js/jquery.zoom.min.js"></script>
  <script src="front/js/jquery.dd.min.js"></script>
  <script src="front/js/jquery.slicknav.js"></script>
  <script src="front/js/owl.carousel.min.js"></script>
  <script src="front/js/owl.carousel2-filter.min.js"></script>
  <script src="front/js/main.js"></script>

  @yield('script')
</body>

</html>