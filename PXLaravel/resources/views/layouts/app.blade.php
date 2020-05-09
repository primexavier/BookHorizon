<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/css/plugins.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/css/main.css') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/image/favicon.ico') }}"> 
    @yield('customHeader')
</head>
<body>
    <div id="app">
        <div class="site-wrapper" id="top">
            <div class="site-header header-4 mb--20 d-none d-lg-block">
                <div class="header-top header-top--style-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="header-top-list">
                                    <li class="dropdown-trigger currency-dropdown"><a href="">£ GBP </a><i
                                            class="fas fa-chevron-down dropdown-arrow"></i>
                                        <ul class="dropdown-box">
                                            <li><a href="#">€ Euro</a></li>
                                            <li><a href="#">£ Pound Sterling</a></li>
                                            <li><a href="#">$ US Dollar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-trigger language-dropdown">
                                        <a href="/en-gb">
                                            <span class="flag-img">
                                                <img src="{{ asset('frontend/image/icon/eng-flag.png') }}" alt="">
                                            </span>
                                            en-gb
                                        </a>
                                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                                        <ul class="dropdown-box">
                                            <li> 
                                                <a href="/en-gb"> 
                                                    <span class="flag-img">
                                                        <img src="{{ asset('frontend/image/icon/eng-flag.png') }}" alt="">
                                                    </span>
                                                    English
                                                </a>
                                            </li>
                                            <li> 
                                                <a href="/german">
                                                    <span class="flag-img">
                                                        <img src="{{ asset('frontend/image/icon/germany-flag.png') }}" alt="">
                                                    </span>
                                                    Germany
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-8 flex-lg-right">
                                <ul class="header-top-list">
                                    @guest
                                    @else
                                    <li>
                                        <a href="">
                                            <i class="icons-left fas fa-random"></i>
                                            My Compare
                                        </a>
                                    </li>
                                    <li class="dropdown-trigger language-dropdown">
                                        <a href="">
                                            <i class="icons-left fas fa-heart"></i>
                                            wishlist (0)
                                        </a>
                                    </li>
                                    <li class="dropdown-trigger language-dropdown">
                                        <a href="">
                                            <i class="icons-left fas fa-user"></i>
                                            My Account
                                        </a>
                                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                                        <ul class="dropdown-box">
                                            <li> <a href="{{ route('profile') }}">My Account</a></li>
                                            <li> <a href="">Order History</a></li>
                                            <li> <a href="">Transactions</a></li>
                                            <li> <a href="">Downloads</a></li>
                                        </ul>
                                    </li>
                                    @endguest
                                    <li>
                                        <a href="">
                                            <i class="icons-left fas fa-phone"></i>
                                            Contact
                                        </a>
                                    </li>
                                    @guest
                                    @else
                                    <li>
                                        <a href="">
                                            <i class="icons-left fas fa-share"></i>
                                            Checkout
                                        </a>
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-middle pt--10 pb--10">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <a href="/" class="site-brand">
                                    <img src="{{ asset('frontend/image/logo.png') }}" alt="">
                                </a>
                            </div>
                            <div class="col-lg-5">
                                <div class="header-search-block">
                                    <input type="text" placeholder="Search entire store here">
                                    <button>Search</button>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="main-navigation flex-lg-right">
                                    <div class="cart-widget">
                                        @guest
                                        <div class="login-block">
                                            <a href="{{ route('login') }}" class="font-weight-bold">Login</a> <br>
                                            <span>or</span><a href="{{ route('register') }}">Register</a>
                                        </div>
                                        @else
                                        <div class="login-block">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                        @endguest
                                        <div class="cart-block">
                                            <div class="cart-total">
                                                <!-- <span class="text-number">
                                                    1
                                                </span> -->
                                                <span class="text-item">
                                                    Shopping Cart
                                                </span>
                                                <span class="price">
                                                    £0.00
                                                    <!-- <i class="fas fa-chevron-down"></i> -->
                                                </span>
                                            </div>
                                            <!-- <div class="cart-dropdown-block">
                                                <div class=" single-cart-block ">
                                                    <div class="cart-product">
                                                        <a href="product-details.html" class="image">
                                                            <img src="{{ asset('frontend/image/products/cart-product-1.jpg') }}" alt="">
                                                        </a>
                                                        <div class="content">
                                                            <h3 class="title"><a href="product-details.html">Kodak PIXPRO
                                                                    Astro Zoom AZ421 16 MP</a>
                                                            </h3>
                                                            <p class="price"><span class="qty">1 ×</span> £87.34</p>
                                                            <button class="cross-btn"><i class="fas fa-times"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" single-cart-block ">
                                                    <div class="btn-block">
                                                        <a href="cart.html" class="btn">View Cart <i
                                                                class="fas fa-chevron-right"></i></a>
                                                        <a href="checkout.html" class="btn btn--primary">Check Out <i
                                                                class="fas fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                @if (\Request::is('login') || \Request::is('register') || \Request::is('password/reset') || \Request::is('user/profile') || \Request::is('blog*')|| \Request::is('contact*'))  
                                    <nav class="category-nav primary-nav">
                                @else
                                    <nav class="category-nav primary-nav show">
                                @endif
                                    <div>
                                        <a href="javascript:void(0)" class="category-trigger">
                                            <i class="fa fa-bars"></i>
                                            Browse categories
                                        </a>
                                        <ul class="category-menu">
                                            <li class="cat-item has-children">
                                                <a href="#">Non Fiction</a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Self-Help /Personal Development</a></li>
                                                    <li><a href="#">Business /Personal Development</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children">
                                                <a href="#">Fiction</a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Fiction Crime, Mystery & Thriller</a></li>
                                                    <li><a href="#">Fiction Young Adult</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children mega-menu"><a href="#">UnCatagories</a>
                                                <ul class="sub-menu">
                                                    <li class="single-block">
                                                        <ul>
                                                            <li><a href="#">Psychology</a></li>
                                                            <li><a href="#">Personal Development</a></li>
                                                            <li><a href="#">Self-Help /Personal Development</a></li>
                                                            <li><a href="#">Beauty and Fashion / Lifestyle</a></li>
                                                            <li><a href="#">Business & Economics</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="single-block">
                                                        <ul>
                                                            <li><a href="#">Wildlife Animals</a></li>
                                                            <li><a href="#">Business /Personal Development</a></li>
                                                            <li><a href="#">Psychology / Self-Help</a></li>
                                                            <li><a href="#">History</a></li>
                                                            <li><a href="#">Business / Biography</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="single-block">
                                                        <ul>
                                                            <li><a href="#">Family & Relationship</a></li>
                                                            <li><a href="#">Science & Nature</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <!-- <li class="cat-item has-children"><a href="#">Business & Money</a>
                                                <ul class="sub-menu">
                                                    <li><a href="">Brake Tools</a></li>
                                                    <li><a href="">Driveshafts</a></li>
                                                    <li><a href="">Emergency Brake</a></li>
                                                    <li><a href="">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children"><a href="#">Calendars</a>
                                                <ul class="sub-menu">
                                                    <li><a href="">Brake Tools</a></li>
                                                    <li><a href="">Driveshafts</a></li>
                                                    <li><a href="">Emergency Brake</a></li>
                                                    <li><a href="">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children"><a href="#">Children's Books</a>
                                                <ul class="sub-menu">
                                                    <li><a href="">Brake Tools</a></li>
                                                    <li><a href="">Driveshafts</a></li>
                                                    <li><a href="">Emergency Brake</a></li>
                                                    <li><a href="">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children"><a href="#">Comics</a>
                                                <ul class="sub-menu">
                                                    <li><a href="">Brake Tools</a></li>
                                                    <li><a href="">Driveshafts</a></li>
                                                    <li><a href="">Emergency Brake</a></li>
                                                    <li><a href="">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item"><a href="#">Perfomance Filters</a></li>
                                            <li class="cat-item has-children"><a href="#">Cookbooks</a>
                                                <ul class="sub-menu">
                                                    <li><a href="">Brake Tools</a></li>
                                                    <li><a href="">Driveshafts</a></li>
                                                    <li><a href="">Emergency Brake</a></li>
                                                    <li><a href="">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item hidden-menu-item"><a href="#">Accessories</a></li>
                                            <li class="cat-item hidden-menu-item"><a href="#">Education</a></li>
                                            <li class="cat-item hidden-menu-item"><a href="#">Indoor Living</a></li>
                                            <li class="cat-item"><a href="#" class="js-expand-hidden-menu">More -->
                                                    <!-- Categories</a></li> -->
                                        <!-- </ul> -->
                                    </div>
                                </nav>
                            </div>
                            <div class="col-lg-3">
                                <div class="header-phone ">
                                    <div class="icon">
                                        <i class="fas fa-headphones-alt"></i>
                                    </div>
                                    <div class="text">
                                        <p>Free Support 24/7</p>
                                        <p class="font-weight-bold number">+0000 0000 0000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="main-navigation flex-lg-right">
                                    <ul class="main-menu menu-right li-last-0">
                                        <li class="menu-item">
                                            <a href="/">
                                                Home 
                                            </a>
                                        </li>
                                        <!-- Shop -->
                                        <!-- <li class="menu-item has-children mega-menu">
                                            <a href="javascript:void(0)">shop <i
                                                    class="fas fa-chevron-down dropdown-arrow"></i></a>
                                            <ul class="sub-menu four-column">
                                                <li class="cus-col-25">
                                                    <h3 class="menu-title"><a href="javascript:void(0)">Shop Grid </a></h3>
                                                    <ul class="mega-single-block">
                                                        <li><a href="shop-grid.html">Fullwidth</a></li>
                                                        <li><a href="shop-grid-left-sidebar.html">left Sidebar</a></li>
                                                        <li><a href="shop-grid-right-sidebar.html">Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="cus-col-25">
                                                    <h3 class="menu-title"> <a href="javascript:void(0)">Shop List</a></h3>
                                                    <ul class="mega-single-block">
                                                        <li><a href="shop-list.html">Fullwidth</a></li>
                                                        <li><a href="shop-list-left-sidebar.html">left Sidebar</a></li>
                                                        <li><a href="shop-list-right-sidebar.html">Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="cus-col-25">
                                                    <h3 class="menu-title"> <a href="javascript:void(0)">Product Details
                                                            1</a></h3>
                                                    <ul class="mega-single-block">
                                                        <li><a href="product-details.html">Product Details Page</a></li>
                                                        <li><a href="product-details-affiliate.html">Product Details
                                                                Affiliate</a></li>
                                                        <li><a href="product-details-group.html">Product Details Group</a>
                                                        </li>
                                                        <li><a href="product-details-variable.html">Product Details
                                                                Variables</a></li>
                                                    </ul>
                                                </li>
                                                <li class="cus-col-25">
                                                    <h3 class="menu-title"><a href="javascript:void(0)">Product Details
                                                            2</a></h3>
                                                    <ul class="mega-single-block">
                                                        <li><a href="product-details-left-thumbnail.html">left Thumbnail</a>
                                                        </li>
                                                        <li><a href="product-details-right-thumbnail.html">Right
                                                                Thumbnail</a></li>
                                                        <li><a href="product-details-left-gallery.html">Left Gallery</a>
                                                        </li>
                                                        <li><a href="product-details-right-gallery.html">Right Gallery</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li> -->
                                        <!-- Pages -->
                                        <!-- <li class="menu-item has-children">
                                            <a href="javascript:void(0)">Pages <i
                                                    class="fas fa-chevron-down dropdown-arrow"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="compare.html">Compare</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="login-register.html">Login Register</a></li>
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="order-complete.html">Order Complete</a></li>
                                                <li><a href="faq.html">Faq</a></li>
                                                <li><a href="contact-2.html">contact 02</a></li>
                                            </ul>
                                        </li> -->
                                        <!-- Blog -->
                                        <li class="menu-item">
                                            <a href="/blog">
                                                Blog 
                                                <!-- <i class="fas fa-chevron-down dropdown-arrow"></i> -->
                                            </a>
                                            <!-- <ul class="sub-menu three-column">
                                                <li class="cus-col-33">
                                                    <h3 class="menu-title"><a href="javascript:void(0)">Blog Grid</a></h3>
                                                    <ul class="mega-single-block">
                                                        <li><a href="blog.html">Full Widh (Default)</a></li>
                                                        <li><a href="blog-left-sidebar.html">left Sidebar</a></li>
                                                        <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="cus-col-33">
                                                    <h3 class="menu-title"><a href="javascript:void(0)">Blog List </a></h3>
                                                    <ul class="mega-single-block">
                                                        <li><a href="blog-list-left-sidebar.html">left Sidebar</a></li>
                                                        <li><a href="blog-list-right-sidebar.html">Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="cus-col-33">
                                                    <h3 class="menu-title"><a href="javascript:void(0)">Blog Details</a>
                                                    </h3>
                                                    <ul class="mega-single-block">
                                                        <li><a href="blog-details.html">Image Format (Default)</a></li>
                                                        <li><a href="blog-details-gallery.html">Gallery Format</a></li>
                                                        <li><a href="blog-details-audio.html">Audio Format</a></li>
                                                        <li><a href="blog-details-video.html">Video Format</a></li>
                                                        <li><a href="blog-details-left-sidebar.html">left Sidebar</a></li>
                                                    </ul>
                                                </li>
                                            </ul> -->
                                        </li>
                                        <li class="menu-item">
                                            <a href="/contact">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-mobile-menu">
                <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
                    <div class="container">
                        <div class="row align-items-sm-end align-items-center">
                            <div class="col-md-4 col-7">
                                <a href="/" class="site-brand">
                                    <img src="{{ asset('frontend/image/logo.png') }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-5 order-3 order-md-2">
                                <nav class="category-nav   ">
                                    <div>
                                        <a href="javascript:void(0)" class="category-trigger">
                                            <i class="fa fa-bars"></i>
                                            Browse categories
                                        </a>
                                        <ul class="category-menu">
                                            <li class="cat-item has-children">
                                                <a href="#">Arts & Photography</a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Bags & Cases</a></li>
                                                    <li><a href="#">Binoculars & Scopes</a></li>
                                                    <li><a href="#">Digital Cameras</a></li>
                                                    <li><a href="#">Film Photography</a></li>
                                                    <li><a href="#">Lighting & Studio</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children mega-menu"><a href="#">Biographies</a>
                                                <ul class="sub-menu">
                                                    <li class="single-block">
                                                        <h3 class="title">WHEEL SIMULATORS</h3>
                                                        <ul>
                                                            <li><a href="#">Bags & Cases</a></li>
                                                            <li><a href="#">Binoculars & Scopes</a></li>
                                                            <li><a href="#">Digital Cameras</a></li>
                                                            <li><a href="#">Film Photography</a></li>
                                                            <li><a href="#">Lighting & Studio</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="single-block">
                                                        <h3 class="title">WHEEL SIMULATORS</h3>
                                                        <ul>
                                                            <li><a href="#">Bags & Cases</a></li>
                                                            <li><a href="#">Binoculars & Scopes</a></li>
                                                            <li><a href="#">Digital Cameras</a></li>
                                                            <li><a href="#">Film Photography</a></li>
                                                            <li><a href="#">Lighting & Studio</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="single-block">
                                                        <h3 class="title">WHEEL SIMULATORS</h3>
                                                        <ul>
                                                            <li><a href="#">Bags & Cases</a></li>
                                                            <li><a href="#">Binoculars & Scopes</a></li>
                                                            <li><a href="#">Digital Cameras</a></li>
                                                            <li><a href="#">Film Photography</a></li>
                                                            <li><a href="#">Lighting & Studio</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="single-block">
                                                        <h3 class="title">WHEEL SIMULATORS</h3>
                                                        <ul>
                                                            <li><a href="#">Bags & Cases</a></li>
                                                            <li><a href="#">Binoculars & Scopes</a></li>
                                                            <li><a href="#">Digital Cameras</a></li>
                                                            <li><a href="#">Film Photography</a></li>
                                                            <li><a href="#">Lighting & Studio</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children"><a href="#">Business & Money</a>
                                                <ul class="sub-menu">
                                                    <li><a href="">Brake Tools</a></li>
                                                    <li><a href="">Driveshafts</a></li>
                                                    <li><a href="">Emergency Brake</a></li>
                                                    <li><a href="">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children"><a href="#">Calendars</a>
                                                <ul class="sub-menu">
                                                    <li><a href="">Brake Tools</a></li>
                                                    <li><a href="">Driveshafts</a></li>
                                                    <li><a href="">Emergency Brake</a></li>
                                                    <li><a href="">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children"><a href="#">Children's Books</a>
                                                <ul class="sub-menu">
                                                    <li><a href="">Brake Tools</a></li>
                                                    <li><a href="">Driveshafts</a></li>
                                                    <li><a href="">Emergency Brake</a></li>
                                                    <li><a href="">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item has-children"><a href="#">Comics</a>
                                                <ul class="sub-menu">
                                                    <li><a href="">Brake Tools</a></li>
                                                    <li><a href="">Driveshafts</a></li>
                                                    <li><a href="">Emergency Brake</a></li>
                                                    <li><a href="">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item"><a href="#">Perfomance Filters</a></li>
                                            <li class="cat-item has-children"><a href="#">Cookbooks</a>
                                                <ul class="sub-menu">
                                                    <li><a href="">Brake Tools</a></li>
                                                    <li><a href="">Driveshafts</a></li>
                                                    <li><a href="">Emergency Brake</a></li>
                                                    <li><a href="">Spools</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item "><a href="#">Accessories</a></li>
                                            <li class="cat-item "><a href="#">Education</a></li>
                                            <li class="cat-item hidden-menu-item"><a href="#">Indoor Living</a></li>
                                            <li class="cat-item"><a href="#" class="js-expand-hidden-menu">More
                                                    Categories</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-md-3 col-5  order-md-3 text-right">
                                <div class="mobile-header-btns header-top-widget">
                                    <ul class="header-links">
                                        <li class="sin-link">
                                            <a href="/cart" class="cart-link link-icon">
                                                <i class="ion-bag"></i>
                                            </a>
                                        </li>
                                        <li class="sin-link">
                                            <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn">
                                                <i class="ion-navicon"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!--Off Canvas Navigation Start-->
                <aside class="off-canvas-wrapper">
                    <div class="btn-close-off-canvas">
                        <i class="ion-android-close"></i>
                    </div>
                    <div class="off-canvas-inner">
                        <!-- search box start -->
                        <div class="search-box offcanvas">
                            <form>
                                <input type="text" placeholder="Search Here">
                                <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <!-- search box end -->
                        <!-- mobile menu start -->
                        <div class="mobile-navigation">
                            <!-- mobile menu navigation start -->
                            <nav class="off-canvas-nav">
                                <ul class="mobile-menu main-mobile-menu">
                                    <li class="menu-item">
                                        <a href="/">Home</a>
                                    </li>
                                    <!-- <li class="menu-item-has-children">
                                        <a href="#">Blog</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item-has-children">
                                                <a href="#">Blog Grid</a>
                                                <ul class="sub-menu">
                                                    <li><a href="blog.html">Full Widh (Default)</a></li>
                                                    <li><a href="blog-left-sidebar.html">left Sidebar</a></li>
                                                    <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Blog List</a>
                                                <ul class="sub-menu">
                                                    <li><a href="blog-list.html">Full Widh (Default)</a></li>
                                                    <li><a href="blog-list-left-sidebar.html">left Sidebar</a></li>
                                                    <li><a href="blog-list-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Blog Details</a>
                                                <ul class="sub-menu">
                                                    <li><a href="blog-details.html">Image Format (Default)</a></li>
                                                    <li><a href="blog-details-gallery.html">Gallery Format</a></li>
                                                    <li><a href="blog-details-audio.html">Audio Format</a></li>
                                                    <li><a href="blog-details-video.html">Video Format</a></li>
                                                    <li><a href="blog-details-left-sidebar.html">left Sidebar</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <!-- <li class="menu-item-has-children">
                                        <a href="#">Shop</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item-has-children">
                                                <a href="#">Shop Grid</a>
                                                <ul class="sub-menu">
                                                    <li><a href="shop-grid.html">Fullwidth</a></li>
                                                    <li><a href="shop-grid-left-sidebar.html">left Sidebar</a></li>
                                                    <li><a href="shop-grid-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Shop List</a>
                                                <ul class="sub-menu">
                                                    <li><a href="shop-list.html">Fullwidth</a></li>
                                                    <li><a href="shop-list-left-sidebar.html">left Sidebar</a></li>
                                                    <li><a href="shop-list-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Product Details 1</a>
                                                <ul class="sub-menu">
                                                    <li><a href="product-details.html">Product Details Page</a></li>
                                                    <li><a href="product-details-affiliate.html">Product Details
                                                            Affiliate</a></li>
                                                    <li><a href="product-details-group.html">Product Details Group</a></li>
                                                    <li><a href="product-details-variable.html">Product Details
                                                            Variables</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Product Details 2</a>
                                                <ul class="sub-menu">
                                                    <li><a href="product-details-left-thumbnail.html">left Thumbnail</a>
                                                    </li>
                                                    <li><a href="product-details-right-thumbnail.html">Right Thumbnail</a>
                                                    </li>
                                                    <li><a href="product-details-left-gallery.html">Left Gallery</a></li>
                                                    <li><a href="product-details-right-gallery.html">Right Gallery</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <!-- <li class="menu-item-has-children">
                                        <a href="#">Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="compare.html">Compare</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="login-register.html">Login Register</a></li>
                                            <li><a href="my-account.html">My Account</a></li>
                                            <li><a href="order-complete.html">Order Complete</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="contact-2.html">contact 02</a></li>
                                        </ul>
                                    </li> -->
                                    <li><a href="/blog">Blog</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- mobile menu end -->
                        <nav class="off-canvas-nav">
                            <ul class="mobile-menu menu-block-2">
                                <li class="menu-item-has-children">
                                    <a href="#">Currency - USD $ <i class="fas fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li> <a href="/usd">USD $</a></li>
                                        <li> <a href="/eur">EUR €</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Lang - Eng<i class="fas fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li>Eng</li>
                                        <li>Ban</li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="">My Account</a></li>
                                        <li><a href="">Order History</a></li>
                                        <li><a href="">Transactions</a></li>
                                        <li><a href="">Downloads</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <div class="off-canvas-bottom">
                            <div class="contact-list mb--10">
                                <a href="" class="sin-contact"><i class="fas fa-mobile-alt"></i>(12345) 78790220</a>
                                <a href="" class="sin-contact"><i class="fas fa-envelope"></i>examle@handart.com</a>
                            </div>
                            <div class="off-canvas-social">
                                <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </aside>
                <!--Off Canvas Navigation End-->
            </div>
            <div class="sticky-init fixed-header common-sticky">
                <div class="container d-none d-lg-block">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <a href="/" class="site-brand">
                                <img src="{{ asset('frontend/image/logo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-8">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right ">
                                    <li class="menu-item">
                                        <a href="/">
                                            Home 
                                        </a>
                                    </li>
                                    <!-- Shop -->
                                    <li class="menu-item has-children mega-menu">
                                        <a href="javascript:void(0)">shop <i
                                                class="fas fa-chevron-down dropdown-arrow"></i></a>
                                        <ul class="sub-menu four-column">
                                            <li class="cus-col-25">
                                                <h3 class="menu-title"><a href="javascript:void(0)">Shop Grid </a></h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="shop-grid.html">Fullwidth</a></li>
                                                    <li><a href="shop-grid-left-sidebar.html">left Sidebar</a></li>
                                                    <li><a href="shop-grid-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="cus-col-25">
                                                <h3 class="menu-title"> <a href="javascript:void(0)">Shop List</a></h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="shop-list.html">Fullwidth</a></li>
                                                    <li><a href="shop-list-left-sidebar.html">left Sidebar</a></li>
                                                    <li><a href="shop-list-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="cus-col-25">
                                                <h3 class="menu-title"> <a href="javascript:void(0)">Product Details 1</a>
                                                </h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="product-details.html">Product Details Page</a></li>
                                                    <li><a href="product-details-affiliate.html">Product Details
                                                            Affiliate</a></li>
                                                    <li><a href="product-details-group.html">Product Details Group</a></li>
                                                    <li><a href="product-details-variable.html">Product Details
                                                            Variables</a></li>
                                                </ul>
                                            </li>
                                            <li class="cus-col-25">
                                                <h3 class="menu-title"><a href="javascript:void(0)">Product Details 2</a>
                                                </h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="product-details-left-thumbnail.html">left Thumbnail</a>
                                                    </li>
                                                    <li><a href="product-details-right-thumbnail.html">Right Thumbnail</a>
                                                    </li>
                                                    <li><a href="product-details-left-gallery.html">Left Gallery</a></li>
                                                    <li><a href="product-details-right-gallery.html">Right Gallery</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- Pages -->
                                    <!-- <li class="menu-item has-children">
                                        <a href="javascript:void(0)">Pages <i
                                                class="fas fa-chevron-down dropdown-arrow"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="compare.html">Compare</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="login-register.html">Login Register</a></li>
                                            <li><a href="my-account.html">My Account</a></li>
                                            <li><a href="order-complete.html">Order Complete</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="contact-2.html">contact 02</a></li>
                                        </ul>
                                    </li> -->
                                    <!-- Blog -->
                                    <li class="menu-item">
                                        <a href="/blog">
                                            Blog
                                            <!-- <i class="fas fa-chevron-down dropdown-arrow"></i> -->
                                        </a>
                                        <!-- <ul class="sub-menu three-column">
                                            <li class="cus-col-33">
                                                <h3 class="menu-title"><a href="javascript:void(0)">Blog Grid</a></h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="blog.html">Full Widh (Default)</a></li>
                                                    <li><a href="blog-left-sidebar.html">left Sidebar</a></li>
                                                    <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="cus-col-33">
                                                <h3 class="menu-title"><a href="javascript:void(0)">Blog List </a></h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="blog-list.html">Full Widh (Default)</a></li>
                                                    <li><a href="blog-list-left-sidebar.html">left Sidebar</a></li>
                                                    <li><a href="blog-list-right-sidebar.html">Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="cus-col-33">
                                                <h3 class="menu-title"><a href="javascript:void(0)">Blog Details</a></h3>
                                                <ul class="mega-single-block">
                                                    <li><a href="blog-details.html">Image Format (Default)</a></li>
                                                    <li><a href="blog-details-gallery.html">Gallery Format</a></li>
                                                    <li><a href="blog-details-audio.html">Audio Format</a></li>
                                                    <li><a href="blog-details-video.html">Video Format</a></li>
                                                    <li><a href="blog-details-left-sidebar.html">left Sidebar</a></li>
                                                </ul>
                                            </li>
                                        </ul> -->
                                    </li>
                                    <li class="menu-item">
                                        <a href="/contact">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            @yield('content')         
            @include('layouts.footer')
        </div>
    </div>
    @include('layouts.script')
    @yield('custom.script')
</body>
</html>
