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
                            tiennguyenvan23@gmail.com</i>
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone">0865892696</i>
                    </div>
                </div>

                <div class="ht-right">
                    <a href="login.html" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="front/img/flag-1.jpg" data-imagecss="flag yt"
                                    data-title="English">English</option>
                            <option value='yu' data-image="front/img/flag-2.jpg" data-imagecss="flag yu"
                                    data-title="English">German</option>
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
                            <a href="index.html">
                                <img src="front/img/logo-1.png" height="30" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                      <form action="shop">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <div class="input-group">
                                <input name="search" value="{{request('search')}}" type="text" placeholder="Tìm kiếm">
                                <button type="submit"><i class="ti-search"></i></button>
                            </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-lg-3 col-md-3 text-right">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
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
                                                                <h6>{{ $cart->name }}</h6>
                                                                <p>{{ $cart->price }} VNĐ x {{ $cart->qty }}</p>                                                         
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i class="si-close">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-x" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z"/>
                                                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                                                </svg>
                                                            </i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>{{ Cart::total() }} VNĐ</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="./cart" class="primary-btn view-card">VIEW CARD </a>
                                        <a href="check-out.html" class="primary-btn check-out">CHECK OUT </a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">{{ Cart::total() }} VNĐ</li>
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
                        <span>All department</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">category-1</a></li>
                            <li><a href="#">category-2</a></li>
                            <li><a href="#">category-3</a></li>
                            <li><a href="#">category-4</a></li>
                            <li><a href="#">Brand</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">category-5</a></li>
                            <li><a href="#">category-6</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="./">Home</a></li>
                        <li class="{{ (request()->segment(1) == 'shop') ? 'active' : '' }}"><a href="./shop">Shop</a></li>
                        <li><a href="">Collection</a>
                            <ul class="dropdown">
                                <li><a href="">Laptop</a></li>
                                <li><a href="">Smartphone</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="">Pages</a>
                            <ul class="dropdown">
                                <li><a href="blog-details.html">Blog Details</a></li>
                                <li><a href="./cart">Shopping Cart</a></li>
                                <li><a href="check-out-html">Checkout</a></li>
                                <li><a href="faq.html">Faq</a></li>
                                <li><a href="register.html">Register</a></li>
                                <li><a href="login.html ">Login</a></li>
                            </ul>
                        </li>
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
    <div class="partner-logo">
        <div class="contain er">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-5.png" alt="">
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
                                <img src="front/img/logo-1.png" height="25" alt="">
                            </a>
                        </div>
                        <ul>
                            <li>Address: Trau Quy Town, Gia Lam, Ha Noi</li>
                            <li>Phone: +84 865.892.696</li>
                            <li>Email: tiennguyenvan@gmail.com</li>
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
                        <h5>Infomation</h5>
                        <ul>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Checkout</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="">My Account</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Shopping Cart</a></li>
                            <li><a href="">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright ©2022 All rights reserved |This website is made <i class="fa fa-heart-o" aria-hidden="true"></i> by Ngoc Anh, Nguyen Tien, Minh Thinh, Quang Huy
                        </div>
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
</body>

</html>
