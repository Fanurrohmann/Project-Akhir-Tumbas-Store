<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('themes/TumbasStore/assets/img/favicon.png') }}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('themes/TumbasStore/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/TumbasStore/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/TumbasStore/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/TumbasStore/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/TumbasStore/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/TumbasStore/assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/TumbasStore/assets/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/TumbasStore/assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/TumbasStore/assets/css/easyzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/TumbasStore/assets/css/bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/TumbasStore/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/TumbasStore/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/TumbasStore/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">

    <script src="{{ asset('themes/TumbasStore/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- header -->

    <header>
        <div class="header-top-furniture wrapper-padding-2 res-header-sm sticky-header">
            <div class="container-fluid">
                <div class="header-bottom-wrapper">
                    <div class="logo-2 furniture-logo ptb-30">
                        <a href="/">
                            <img src="{{ asset('themes/TumbasStore/assets/img/logo/LogoTumbas.svg') }}" alt=""
                                style="width: 210px; height: auto;">
                        </a>
                    </div>
                    <div class="menu-style-2 furniture-menu menu-hover">
                        <nav>
                            <ul>
                                <li><a href="/">home</a></li>
                                <li><a href="{{ url('products') }}">Produk</a>
                                    <div class="category-menu-dropdown shop-menu">
                                        <div class="category-dropdown-style category-common2 mb-30">
                                            <h4 class="categories-subtitle"> Halaman</h4>
                                            <ul>
                                                <li><a href="{{ url('products') }}"> grid 3 column</a></li>
                                                <li><a href="{{ url('carts') }}">Keranjang Belanja</a></li>
                                                <li><a href="{{ url('wishlists') }}">wishlist</a></li>
                                            </ul>
                                        </div>
                                        <div class="category-dropdown-style category-common2 mb-30">
                                            <h4 class="categories-subtitle"> Kategori</h4>
                                            <ul>
                                                @foreach ($categories as $category)
                                                    <li><a
                                                            href="{{ url('products?category=' . $category->slug) }}">{{ $category->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#">Halaman</a>
                                    <ul class="single-dropdown">
                                        <li><a href="{{ url('about_us') }}">Tentang Kami</a></li>
                                        <li><a href="{{ url('orders') }}">Riwayat Pesanan</a></li>
                                        <li><a href="{{ url('contact') }}">Hubungi Kami</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-cart">
                        <a class="icon-cart-furniture" href="{{ url('carts') }}">
                            <i class="ti-shopping-cart"></i>
                            <span class="shop-count-furniture green">{{ Cart::count() }}</span>
                        </a>
                        <!-- @if (Cart::count() > 0)
                            <ul class="cart-dropdown">
                                @foreach (Cart::content() as $item)
                                    @php
                                        $product = isset($item->model->parent) ? $item->model->parent : $item->model;
                                        $image = !empty($product->productImages->first())
                                            ? asset('storage/' . $product->productImages->first()->path)
                                            : asset('themes/TumbasStore/assets/img/cart/3.jpg');
                                    @endphp
                                        <li class="single-product-cart">
                                            <div class="cart-img">
                                                <a href="{{ url('product/' . $product->slug) }}"><img src="{{ $image }}" alt="{{ $product->name }}" style="width:100px"></a>
                                            </div>
                                            <div class="cart-title">
                                                <h5><a href="{{ url('product/' . $product->slug) }}">{{ $item->name }}</a></h5>
                                                <span>{{ number_format($item->price) }} x {{ $item->quantity }}</span>
                                            </div>
                                            <div class="cart-delete">
                                                <a href="{{ url('carts/remove/' . $item->id) }}" class="delete"><i class="ti-trash"></i></a>
                                            </div>
                                        </li>
                                @endforeach
                                    <li class="cart-space">
                                        <div class="cart-sub">
                                            <h4>Subtotal</h4>
                                        </div>
                                        <div class="cart-price">
                                            <h4>{{ Cart::subtotal() }}</h4>
                                        </div>
                                    </li>
                                    <li class="cart-btn-wrapper">
                                        <a class="cart-btn btn-hover" href="{{ url('carts') }}">view cart</a>
                                        <a class="cart-btn btn-hover" href="{{ url('orders/checkout') }}">checkout</a>
                                    </li>
                                </ul>
                        @endif -->
                    </div>
                </div>
                <div class="row">
                    <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                        <div class="mobile-menu">
                         <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li><a href="/">HOME</a>
                                        {{-- <ul>
                                            <li><a href="index.html">Fashion</a></li>
                                            <li><a href="index-fashion-2.html">Fashion style 2</a></li>
                                            <li><a href="index-fruits.html">Fruits</a></li>
                                            <li><a href="index-book.html">book</a></li>
                                            <li><a href="index-electronics.html">electronics</a></li>
                                            <li><a href="index-electronics-2.html">electronics style 2</a></li>
                                            <li><a href="index-food.html">food & drink</a></li>
                                            <li><a href="index-furniture.html">furniture</a></li>
                                            <li><a href="index-handicraft.html">handicraft</a></li>
                                            <li><a href="index-smart-watch.html">smart watch</a></li>
                                            <li><a href="index-sports.html">sports</a></li>
                                        </ul> --}}
                                    </li>
                                    <li><a href="{{ url('products') }}">Produk</a>
                                        <ul>
                                            @foreach ($categories as $category)
                                                <li><a
                                                        href="{{ url('products?category=' . $category->slug) }}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="#">Halaman</a>
                                        <ul>
                                            <li><a href="{{ url('about_us') }}">Tentang Kami</a></li>
                                            <li><a href="{{ url('orders') }}">Riwayat Pesanan</a></li>
                                            <li><a href="{{ url('contact') }}">Hubungi Kami</a></li>
                                            <li><a href="{{ url('carts') }}">Keranjang Belanja</a></li>
                                            <li><a href="{{ url('wishlists') }}">wishlist</a></li>
                                        </ul>
                                    </li>
                                    {{-- <li><a href="#">BLOG</a>
                                        <ul>
                                            <li><a href="blog.html">blog 3 colunm</a></li>
                                            <li><a href="blog-2-col.html">blog 2 colunm</a></li>
                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                            <li><a href="blog-details-sidebar.html">blog details 2</a></li>
                                        </ul>
                                    </li> --}}
                                    {{-- <li><a href="contact.html"> Contact </a></li> --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom-furniture wrapper-padding-2 border-top-3">
            <div class="container-fluid">
                <div class="furniture-bottom-wrapper">
                    <!-- User Authentication Section -->
                    <div class="furniture-login">
                        <ul>
                            @guest
                                <li><a href="{{ url('login') }}" class="text-primary"><i
                                            class="icon-large pe-7s-user"></i> Login</a>
                                </li>
                                <div class="divider"></div>
                                <li><a href="{{ url('register') }}" class="text-success"><i
                                            class="icon-large pe-7s-add-user"></i> Register</a>
                                </li>
                            @else
                                <!-- User Info -->
                                <li>
                                    <a href="{{ url('profile') }}" class="text-primary">
                                        <i class="icon-large pe-7s-user"></i> {{ Auth::user()->first_name }}
                                    </a>
                                </li>
                                <!-- Divider -->
                                <div class="divider"></div>
                                <!-- Admin Management -->
                                @if (Auth::user()->is_admin)
                                    <li>
                                        <a href="{{ url('admin/dashboard') }}" class="text-warning">
                                            <i class="icon-large pe-7s-tools"></i> Kelola
                                        </a>
                                    </li>
                                    <!-- Divider -->
                                    <div class="divider"></div>
                                @endif
                                <!-- Logout -->
                                <li>
                                    <a href="{{ route('logout') }}" class="text-danger"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="icon-large pe-7s-power"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>

                    <!-- Search Section -->
                    <div class="furniture-search">
                        <form action="{{ url('products') }}" method="GET" class="d-flex align-items-center">
                            <input type="text" name="q" value="{{ isset($q) ? $q : null }}"
                                placeholder="Silahkan Cari Produk ..."
                                class="form-control rounded-start border-end-0 px-3">
                            <button type="submit"
                                class="btn btn-secondary rounded-end d-flex align-items-center justify-content-center">
                                <i class="pe-7s-search icon-large"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Wishlist Section -->
                    <div class="furniture-wishlist">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="{{ url('wishlists') }}" class="d-flex align-items-center text-danger">
                                    <i class="pe-7s-like icon-large me-2"></i>
                                    <span>Favorites</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end -->

    @yield('content')

    <!-- services -->
    <div class="services-area wrapper-padding-4 gray-bg pt-120 pb-80">
        <div class="container-fluid">
            <div class="services-wrapper">
                <div class="single-services mb-40">
                    <div class="services-img">
                        <img src="{{ asset('themes/TumbasStore/assets/img/icon-img/59.png') }}" alt=""
                            style="width: 165px; height: auto;">
                    </div>
                    <div class="services-content">
                        <h4>Ongkir Terjangkau</h4>
                        <p>Ongkos Kirim yang Terjangkau dan mencakup seluruh wilayah indonesia. </p>
                    </div>
                </div>
                <div class="single-services mb-40">
                    <div class="services-img">
                        <img src="{{ asset('themes/TumbasStore/assets/img/icon-img/60.png') }}" alt=""
                            style="width: 165px; height: auto;">
                    </div>
                    <div class="services-content">
                        <h4>24/7 Support</h4>
                        <p>Pelayanan 24 Jam Untuk Kenyamanan berberlanja. </p>
                    </div>
                </div>
                <div class="single-services mb-40">
                    <div class="services-img">
                        <img src="{{ asset('themes/TumbasStore/assets/img/icon-img/61.png') }}" alt=""
                            style="width: 165px; height: auto;">
                    </div>
                    <div class="services-content">
                        <h4>Secure Payments</h4>
                        <p>Pembayaran yang aman dan Terjamain mengunakan midtrans.. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->

    <!-- footer -->
    <footer class="footer-area">
        <div class="footer-top-area pt-40 pb-7 wrapper-padding-5">
            <div class="container-fluid">
                <div class="widget-wrapper">
                    <div class="footer-widget mb-30">
                        <a href="#"><img src="{{ asset('themes/TumbasStore/assets/img/logo/LogoTumbas.svg') }}"
                                alt="" style="width: 210px; height: auto;"></a>
                        <div class="footer-about-2">
                            <p>Tumbas Store adalah platform belanja online yang mengusung<br>kekayaan budaya Indonesia.
                                Kami menyediakan berbagai produk<br>
                                seperti pakaian tradisional, camilan khas Nusantara, hingga<br>dekorasi rumah unik yang
                                dibuat dengan kualitas terbaik.<br>
                                Tumbas Store berkomitmen untuk memberikan pengalaman<br>belanja yang mudah, aman, dan
                                memuaskan.</p>
                        </div>
                    </div>
                    <div class="footer-widget mb-30">
                        <h3 class="footer-widget-title-5">Info Kontak</h3>
                        <div class="footer-info-wrapper-3">
                            <div class="footer-address-furniture">
                                <div class="footer-info-icon3">
                                    <span>Alamat: </span>
                                </div>
                                <div class="footer-info-content3">
                                    <p>Jl. Seti 1, RT.02/RW.04, Kec. Dukuhseti <br>Kab. PATI JAWA TENGAH 59158</p>
                                </div>
                            </div>
                            <div class="footer-address-furniture">
                                <div class="footer-info-icon3">
                                    <span>Telefon: </span>
                                </div>
                                <div class="footer-info-content3">
                                    <p>+6288238365649 <br>+6281994351736</p>
                                </div>
                            </div>
                            <div class="footer-address-furniture">
                                <div class="footer-info-icon3">
                                    <span>E-mail: </span>
                                </div>
                                <div class="footer-info-content3">
                                    <p><a href="#"> alfarohman160@gmail.com</a> <br><a href="#">
                                            Tumbas@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-widget mb-30">
                        <h3 class="footer-widget-title-5">Kritik & Saran</h3>
                        <div class="footer-newsletter-2">
                            <p>Masukkan kritik atau saran Anda, segera kami tindaklanjuti.</p>
                            <div id="feedback_form" class="subscribe-form-5">
                                <form id="feedback-form">
                                    <div id="feedback_form_scroll" class="mc-form">
                                        <!-- Input untuk kritik atau saran -->
                                        <textarea name="message" class="feedback-textarea" placeholder="Tulis kritik atau saran Anda di sini..." required></textarea>
                                        <!-- Tombol Kirim -->
                                        <div class="feedback-buttons">
                                            <button type="button" id="send-email" class="feedback-btn btn-email">
                                                <i class="fas fa-envelope mr-2"></i> Kirim ke Email
                                            </button>
                                            <a id="send-whatsapp" target="_blank" class="feedback-btn btn-whatsapp">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg"
                                                    alt="WhatsApp" style="width: 20px; vertical-align: middle;"> Kirim
                                                via WhatsApp
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom ptb-20 gray-bg-8">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="copyright-furniture">
                            <p>Copyright © <a href="https://hastech.company/">Muhammad Alfa Nur Rohman</a> 2024 .
                                Tumbas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end -->
    <div id="loader" style="display: none;">
        <div id="loading"
            style="z-index:99999;position: fixed;top:0;left:0;right:0;bottom:0;background-color:rgba(0,0,0,.3);display: flex;justify-content:center;align-items: center;"
            class="mx-auto">
            <p><img src="{{ asset('themes/TumbasStore/assets/img/loading.gif') }}" /> Please Wait</p>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="pe-7s-close" aria-hidden="true"></span>
        </button>
        <div class="modal-dialog modal-quickview-width" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="qwick-view-left">
                        <div class="quick-view-learg-img">
                            <div class="quick-view-tab-content tab-content">
                                <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                    <img src="{{ asset('themes/TumbasStore/assets/img/quick-view/l1.jpg') }}"
                                        alt="">
                                </div>
                                <div class="tab-pane fade" id="modal2" role="tabpanel">
                                    <img src="{{ asset('themes/TumbasStore/assets/img/quick-view/l2.jpg') }}"
                                        alt="">
                                </div>
                                <div class="tab-pane fade" id="modal3" role="tabpanel">
                                    <img src="{{ asset('themes/TumbasStore/assets/img/quick-view/l3.jpg') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="quick-view-list nav" role="tablist">
                            <a class="active" href="#modal1" data-toggle="tab" role="tab">
                                <img src="{{ asset('themes/TumbasStore/assets/img/quick-view/s1.jpg') }}" alt="">
                            </a>
                            <a href="#modal2" data-toggle="tab" role="tab">
                                <img src="{{ asset('themes/TumbasStore/assets/img/quick-view/s2.jpg') }}" alt="">
                            </a>
                            <a href="#modal3" data-toggle="tab" role="tab">
                                <img src="{{ asset('themes/TumbasStore/assets/img/quick-view/s3.jpg') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="qwick-view-right">
                        <div class="qwick-view-content">
                            <h3>Handcrafted Supper Mug</h3>
                            <div class="price">
                                <span class="new">$90.00</span>
                                <span class="old">$120.00 </span>
                            </div>
                            <div class="rating-number">
                                <div class="quick-view-rating">
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                </div>
                                <div class="quick-view-number">
                                    <span>2 Ratting (S)</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do tempor incididun ut labore et
                                dolore magna aliqua. Ut enim ad mi , quis nostrud veniam exercitation .</p>
                            <div class="quick-view-select">
                                <div class="select-option-part">
                                    <label>Size*</label>
                                    <select class="select">
                                        <option value="">- Please Select -</option>
                                        <option value="">900</option>
                                        <option value="">700</option>
                                    </select>
                                </div>
                                <div class="select-option-part">
                                    <label>Color*</label>
                                    <select class="select">
                                        <option value="">- Please Select -</option>
                                        <option value="">orange</option>
                                        <option value="">pink</option>
                                        <option value="">yellow</option>
                                    </select>
                                </div>
                            </div>
                            <div class="quickview-plus-minus">
                                <div class="cart-plus-minus">
                                    <input type="text" value="02" name="qtybutton"
                                        class="cart-plus-minus-box">
                                </div>
                                <div class="quickview-btn-cart">
                                    <a class="btn-hover-black" href="#">add to cart</a>
                                </div>
                                <div class="quickview-btn-wishlist">
                                    <a class="btn-hover" href="#"><i class="pe-7s-like"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="pe-7s-close" aria-hidden="true" style="cursor: pointer;"></span>
        </button>
        <div class="modal-dialog" role="document" style="margin: 150px auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login">
                        <div class="login-form-container" style="width:400px">
                            <div class="login-form">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required
                                                autocomplete="email" autofocus
                                                placeholder="{{ __('E-Mail Address') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="{{ __('Password') }}">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12">
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label for="remember">{{ __('Remember Me') }}</label>
                                                    <a
                                                        href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                                                </div>
                                                <button type="submit" class="default-btn floatright">Login</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->


    <!-- all js here -->
    <script src="{{ asset('themes/TumbasStore/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('themes/TumbasStore/assets/js/popper.js') }}"></script>
    <script src="{{ asset('themes/TumbasStore/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('themes/TumbasStore/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('themes/TumbasStore/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('themes/TumbasStore/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('themes/TumbasStore/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('themes/TumbasStore/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('themes/TumbasStore/assets/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('themes/TumbasStore/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('themes/TumbasStore/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('themes/TumbasStore/assets/js/main.js') }}"></script>
    <script src="{{ asset('themes/TumbasStore/assets/js/app.js') }}"></script>
    <script src="{{ asset('themes/TumbasStore/assets/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(".delete").on("click", function() {
            return confirm("Do you want to remove this?");
        });
    </script>
    @stack('script-alt')
</body>

</html>
