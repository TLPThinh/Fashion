<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="{{ asset('asset/client/images/favicon.png') }}">
      <title>{{ setting_website()->name }}</title>
      <link href="{{ asset('asset/client/css/bootstrap.css') }}" rel="stylesheet">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
      <link href="{{ asset('asset/client/css/font-awesome.min.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('asset/client/css/flexslider.css') }}" type="text/css" media="screen"/>
      <link href="{{ asset('asset/client/css/sequence-looptheme.css') }}" rel="stylesheet" media="all"/>
      <link href="{{ asset('asset/client/css/style.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('asset/admin/plugins/fontawesome-free/css/all.min.css') }}">
      @vite(['resources/client/css/auth.css', 'resources/client/css/home.css'])
      <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script><![endif]-->
   </head>
   <style>
      .header-flex-container {
          display: grid;
          grid-template-columns: 1fr auto 1fr;
          align-items: center;
          width: 100%;
          padding: 10px 0;
      }
      .header_bottom {
          background: transparent !important;
          padding: 0 !important;
          border: none !important;
          display: flex;
          justify-content: center;
      }
      .navbar-collapse {
          padding: 0 !important;
      }
      .navbar-nav {
          margin: 0 !important;
          float: none !important;
          display: flex !important;
          justify-content: center;
      }
      .navbar-nav > li {
          float: none !important;
      }
      .header-right-icons {
          display: flex;
          align-items: center;
          gap: 15px;
          justify-content: flex-end;
      }
       .option {
           display: flex !important;
           align-items: center;
           margin: 0 !important;
           padding: 0 !important;
           height: auto !important;
           gap: 10px;
       }
       .option li {
           float: none !important;
           display: flex !important;
           align-items: center;
           margin: 0 !important;
       }
        .search form {
            display: flex;
            align-items: center;
            padding: 0 !important;
            margin: 0 !important;
            height: 100%;
        }
       .search-submit, .option-cart a.cart-icon {
           float: none !important;
           margin: 0 !important;
           display: flex !important;
           align-items: center;
           justify-content: center;
           width: 32px !important;
           height: 32px !important;
           line-height: 1 !important;
           padding: 0 !important;
       }
       .option-cart .cart_no {
           top: -5px !important;
           right: -5px !important;
       }
       .usermenu {
           margin: 0 !important;
           padding: 0 !important;
           float: none !important;
           display: flex;
           align-items: center;
           gap: 15px;
       }
       .usermenu > li {
           float: none !important;
           margin: 0 !important;
       }
       .usermenu > li > a {
           display: flex;
           align-items: center;
           gap: 8px;
           color: #fff;
           background: none !important;
           padding: 0 !important;
       }
       .usermenu > li > a i {
           font-size: 20px;
           color: #a0a0a0;
       }
       .usermenu > li > a:hover i {
           color: #fff;
       }
       .usermenu .dropdown-menu {
           background-color: #fff;
           border-radius: 8px;
           padding: 10px 0;
           box-shadow: 0 5px 15px rgba(0,0,0,0.1);
           border: 1px solid #eee;
           min-width: 180px;
       }
       .usermenu .dropdown-menu ul {
           padding: 0 !important;
           margin: 0 !important;
           list-style: none !important;
       }
       .usermenu .dropdown-menu li {
           width: 100% !important;
           padding: 0 !important;
           margin: 0 !important;
       }
       .usermenu .dropdown-menu a {
           color: #333 !important;
           padding: 10px 15px !important;
           display: block !important;
           background: transparent !important;
           transition: all 0.2s;
           text-align: center !important;
           width: 100% !important;
       }
       .usermenu .dropdown-menu a:hover {
           color: #f7544a !important;
           background-color: #f8f9fa !important;
       }
       .user-text-stacked {
           display: flex;
           flex-direction: column;
           line-height: 1.1;
           font-size: 12px;
       }
       .user-actions {
           display: flex;
           align-items: center;
           margin-left: 20px;
       }
        .search-submit, .option-cart a.cart-icon {
            float: none !important;
            margin: 0 !important;
            display: flex !important;
            align-items: center;
            justify-content: center;
            width: 38px !important;
            height: 38px !important;
            line-height: 1 !important;
            padding: 0 !important;
            font-size: 16px;
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1) !important;
            background-image: none !important;
            border-radius: 8px !important;
            border: none !important;
            transition: background-color 0.3s;
            transform: translateY(-1px); /* Nhích nhẹ lên trên để cân bằng thị giác */
        }
       .search-submit:hover, .option-cart a.cart-icon:hover {
           background-color: #f7544a !important;
       }
       .option-cart {
           position: relative;
       }
       .option-cart .cart_no {
           position: absolute;
           top: -5px !important;
           right: -5px !important;
           background: #f7544a;
           color: #fff;
           font-size: 11px;
           width: 18px;
           height: 18px;
           border-radius: 50%;
           display: flex;
           justify-content: center;
           align-items: center;
       }
        .logo img {
            max-height: 70px;
        }
      .thumbnail{
          margin: unset;
          height: 260px;
      }
  
      .thumbnail img{
          height: 100% !important;
          width: 100% !important;
          object-fit: cover;
      }
      .productname{
          padding-top: 10px;
      }
   </style>
   <body id="home">
      <div class="wrapper">
         <div class="header">
            <div class="container">
               <div class="header-flex-container">
                  <!-- Logo -->
                  <div class="logo">
                     <a href="{{ route('user.home') }}">
                        <img src="{{ asset("asset/client/images/" . setting_website()->logo) }}" alt="FashionShop">
                     </a>
                  </div>

                  <!-- Navigation Menu -->
                  <div class="header_bottom">
                     <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                           <span class="sr-only">Toggle navigation</span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                        </button>
                     </div>
                     <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                           <li class="dropdown {{ (request()->is('/*')) ? 'active' : '' }}">
                              <a href="{{ route('user.home') }}">Trang Chủ</a>
                           </li>
                           @foreach (category_header() as $category)
                              <li class="dropdown @php
                                 if (isset($request->slug) && $request->slug == $category->slug) {
                                    echo "active";
                                 }
                              @endphp">
                                 <a href="{{ route('user.products', $category->slug) }}">{{ $category->name }}</a>
                              </li>
                           @endforeach

                        </ul>
                     </div>
                  </div>

                  <!-- Right Side Icons (Search, User, Cart) -->
                  <div class="header-right-icons">
                     <ul class="option">
                        <li id="search" class="search">
                           <form method="GET" action="{{ route('user.search') }}">
                              <button class="search-submit" type="submit"><i class="fas fa-search"></i></button>
                              <input class="search-input" placeholder="Nhập tên sản phẩm" type="text" value="" name="keyword">
                           </form>
                        </li>
                        <li class="option-cart">
                           <a href="{{ route('cart.index') }}" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
                        </li>
                     </ul>

                     <div class="user-actions">
                        @if (Auth::check())
                        <ul class="nav navbar-nav usermenu">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle profile" data-toggle="dropdown">
                                 <i class="far fa-user-circle"></i>
                                 <span>{{ Auth::user()->name }}</span>
                              </a>
                              <div class="dropdown-menu">
                                 <ul class="mega-menu-links">
                                    <li><a href="{{ route('profile.index') }}">Thông tin cá nhân</a></li>
                                    <li><a href="{{ route('order_history.index') }}">Lịch sử mua hàng</a></li>
                                    <li><a href="{{ route('user.logout') }}">Đăng xuất</a></li>
                                 </ul>
                              </div>
                           </li>
                        </ul>
                        @else
                        <ul class="usermenu">
                           <li>
                              <a href="{{ route('user.login') }}" class="log">
                                 <i class="far fa-user-circle"></i>
                                 <div class="user-text-stacked">
                                     <span>Đăng</span>
                                     <span>Nhập</span>
                                 </div>
                              </a>
                           </li>
                           <li>
                              <a href="{{ route('user.register') }}" class="reg">
                                 <i class="fas fa-key"></i>
                                 <div class="user-text-stacked">
                                     <span>Đăng</span>
                                     <span>Kí</span>
                                 </div>
                              </a>
                           </li>
                        </ul>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @yield('content-client')
         <div class="clearfix"></div>
         <div class="footer">
            <div class="footer-info">
               <div class="container">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="footer-logo">
                           <a href="{{ route('user.home') }}">
                              <img src="{{ asset("asset/client/images/" . setting_website()->logo) }}" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-6">
                        <h4 class="title">Thông tin liên hệ</h4>
                        <p>{{ setting_website()->address }}</p>
                        <p>Số điện thoại : {{ setting_website()->phone_number }}</p>
                        <p>Email : {{ setting_website()->email }}</p>
                     </div>
                     <div class="col-md-3 col-sm-6">
                        <h4 class="title">Về chúng tôi</h4>
                        <p>
                           Chuyên bán thời trang an toàn. Tin cậy nhanh chóng. Chăm sóc khách hàng 24/24
                        </p>
                     </div>
                     <div class="col-md-3">
                        <h4 class="title">Nhận thông tin từ chúng tôi</h4>
                        <p>Cảm ơn rất nhiều</p>
                        <form class="newsletter">
                           <input type="text" name="" placeholder="Email của bạn">
                           <input type="submit" value="Gửi" class="button">
						      </form>
                     </div>
                  </div>
               </div>
            </div>
            {{-- <div class="copyright-info">
               <div class="container">
                  <div class="row">
                     <div class="col-md-6">
                        <p>Copyright © 2012. Designed by <a href="#">Michael Lee</a>. All rights reseved</p>
                     </div>
                     <div class="col-md-6">
                        <ul class="social-icon">
                           <li><a href="#" class="linkedin"></a></li>
                           <li><a href="#" class="google-plus"></a></li>
                           <li><a href="#" class="twitter"></a></li>
                           <li><a href="#" class="facebook"></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div> --}}
         </div>
      </div>
      @if (Session::has('success'))
        <span id="toast__js" message="{{ session('success') }}" type="success"></span>
      @elseif (Session::has('error'))
         <span id="toast__js" message="{{ session('error') }}" type="error"></span>
      @endif
      <!-- Bootstrap core JavaScript==================================================-->
      <script src="{{ asset('asset/admin/plugins/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('asset/admin/plugins/jquery-validation/jquery.validate.js') }}"></script>
      <script type="text/javascript" src="{{ asset('asset/client/js/jquery-1.10.2.min.js') }}"></script>
	  <script type="text/javascript" src="{{ asset('asset/client/js/jquery.easing.1.3.js') }}"></script>
	  <script type="text/javascript" src="{{ asset('asset/client/js/bootstrap.min.js') }}"></script>
	  <script type="text/javascript" src="{{ asset('asset/client/js/jquery.sequence-min.js') }}"></script>
	  <script type="text/javascript" src="{{ asset('asset/client/js/jquery.carouFredSel-6.2.1-packed.js') }}"></script>
     <script type="text/javascript" src="{{ asset('asset/client/js/script.min.js') }}" ></script>
	  <script defer src="{{ asset('asset/client/js/jquery.flexslider.js') }}"></script>
     @vite(['resources/admin/js/toast-message.js'])
   </body>
</html>
