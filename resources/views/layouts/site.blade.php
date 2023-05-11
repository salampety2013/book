<!doctype html>
<html lang="en">
<head>
     <meta charset="utf-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge">
 
    <title>Prestashop_Savemart</title>
    <meta name="description" content="Shop powered by PrestaShop">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=yes">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{asset('assets/front/img/favicon.ico')}}?1531456858">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front/img/favicon.ico')}}?1531456858">
    <link href="{{asset('assets/front/css/css.css')}}?family=Roboto:300,400,500,600,700,900" rel="stylesheet">
    <link href="{{asset('assets/front/css/css-1.css')}}?family=Oswald:300,400,500,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/front/themes/vinova_savemart/assets/cache/theme-78026624.css')}}"
          type="text/css" media="all">


    <script type="text/javascript">

        var prestashop = {
            "static_token": "28add935523ef131c8432825597b9928",
            "token": "cad5fe8236d849a3b4023c4e5ca6a313"
        };
    </script>

    <script type="text/javascript">
        var baseDir = "/savemart/";
        var static_token = "28add935523ef131c8432825597b9928";
    </script>
  
    <style type="text/css">
        #main-site {
            background-color: #ffffff;
        }

        @media (min-width: 1200px) {
            .container {
                width: 1200px;
            }

            #header .container {
                width: 1200px;
            }

            .footer .container {
                width: 1200px;
            }

            #index .container {
                width: 1200px;
            }
        }

        #popup-subscribe .modal-dialog .modal-content {
            background-image: url(../modules/novthemeconfig/images/newsletter_bg-1.png);
        }
    </style>

    @yield('styles')
</head>
 <?php
$currenturl=explode('/',Request::path());
$currentpath=$currenturl[0];
//echo"===".Request::path();
$routename=request::route()->getName();
 //exit;

?>

<body id="index" class="lang-en country-gb currency-gbp layout-full-width page-index tax-display-enabled">


<!--<main id="main-site" class="displayhomenovthree">
-->
  <main id="main-site" class="displayhomenovone">
    <header id="header" class="header-1 sticky-menu">

        @include('front.includes.ar.header-mobile')
        @include('front.includes.ar.header-top')
        @include('front.includes.ar.header-center')
        @include('front.includes.ar.header-bottom')
    </header>

    <div id="header-sticky">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="d-flex align-items-center col-xl-3 col-md-3">
                    <div class="contentstickynew_verticalmenu"></div>
                    <div class="contentstickynew_logo"></div>
                </div>
                <div class="contentstickynew_search col-xl-7 col-md-6"></div>
                <div class="contentstickynew_group d-flex justify-content-end col-xl-2 col-md-3"></div>
            </div>
        </div>
    </div>


    <aside id="notifications">
        <div class="container">


        </div>
    </aside>

    @yield('slider')
    <div id="wrapper-site">
        <div id="content-wrapper" class="full-width">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

            @yield('content')
        </div>
    </div>

    @include('front.includes.footer')
    <div class="canvas-overlay"></div>
    <div id="back-top">
  <span>
    <i class="fa fa-long-arrow-up"></i>  </span>
    </div>
</main>

<div id="mobile_top_menu_wrapper" class="hidden-md-up">
    <div class="content">
        <div id="_mobile_verticalmenu"></div>
    </div>
</div>


<div id="mobile-pagemenu" class="mobile-boxpage d-flex hidden-md-up">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="title-box">Menu</div>
            <div class="close-box">Close</div>
        </div>
        <div class="box-content">
            <div id="_mobile_top_menu" class="js-top-menu"></div>
        </div>
    </div>
</div>
<div id="mobile-blockcart" class="mobile-boxpage d-flex hidden-md-up">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="title-box">Cart</div>
            <div class="close-box">Close</div>
        </div>
        <div id="_mobile_cart" class="box-content"></div>
    </div>
</div>
<div id="mobile-pageaccount" class="mobile-boxpage d-flex hidden-md-up" data-titlebox-parent="Account">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="back-box">Back</div>
            <div class="title-box">Account</div>
            <div class="close-box">Close</div>
        </div>
        <div class="box-content d-flex justify-content-center align-items-center text-center">
            <div>
                <div id="_mobile_account_list">
                    <div class="account-list-content">
                        <div>
                            <a class="login" href="login-1.html" rel="nofollow" title="Log in to your customer account"><i
                                    class="fa fa-sign-in"></i>Sign in</a>
                        </div>
                        <div>
                            <a class="register" href="login-1.html" rel="nofollow" title="Register Account"><i
                                    class="fa fa-user"></i>Register Account</a>
                        </div>
                        <div>
                            <a class="check-out" href="cart.html" rel="nofollow" title="Checkout"><i
                                    class="material-icons">check_circle</i>Checkout</a>
                        </div>
                        <div class="link_wishlist">
                            <a href="login-2.html" title="My Wishlists">
                                <i class="fa fa-heart"></i>My Wishlists
                            </a>
                        </div>
                    </div>
                </div>
                <div class="links-currency" data-target="#box-currency" data-titlebox="Currency"><span>Currency</span><i
                        class="zmdi zmdi-arrow-right"></i></div>
                <div class="links-language" data-target="#box-language" data-titlebox="Language"><span>Language</span><i
                        class="zmdi zmdi-arrow-right"></i></div>
            </div>
        </div>
        <div id="box-currency" class="box-content d-flex">
            <div class="w-100">
                <div class="item-currency current">
                    <a title="British Pound" rel="nofollow"
                       href="index-1.htm?home=home_3&amp;SubmitCurrency=1&amp;id_currency=1">British Pound: GBP</a>
                </div>
                <div class="item-currency">
                    <a title="US Dollar" rel="nofollow"
                       href="index-2.htm?home=home_3&amp;SubmitCurrency=1&amp;id_currency=2">US Dollar: USD</a>
                </div>
            </div>
        </div>

        <div id="box-language" class="box-content d-flex">
            <div class="w-100">
                <div class="item-language current">
                    <a href="index.htm?home=home_3" class="d-flex align-items-center"><img class="img-fluid mr-2"
                                                                                           src="../img/l/1.jpg"
                                                                                           alt="English (English)"
                                                                                           width="16" height="11"><span>English</span></a>
                </div>
                <div class="item-language">
                    <a href="http://demo.bestprestashoptheme.com/savemart/fr/?home=home_3"
                       class="d-flex align-items-center"><img class="img-fluid mr-2" src="../img/l/2.jpg"
                                                              alt="Français (French)" width="16" height="11"><span>Français</span></a>
                </div>
                <div class="item-language">
                    <a href="http://demo.bestprestashoptheme.com/savemart/es/?home=home_3"
                       class="d-flex align-items-center"><img class="img-fluid mr-2" src="../img/l/3.jpg"
                                                              alt="Español (Spanish)" width="16" height="11"><span>Español</span></a>
                </div>
                <div class="item-language">
                    <a href="http://demo.bestprestashoptheme.com/savemart/it/?home=home_3"
                       class="d-flex align-items-center"><img class="img-fluid mr-2" src="../img/l/4.jpg"
                                                              alt="Italiano (Italian)" width="16" height="11"><span>Italiano</span></a>
                </div>
                <div class="item-language">
                    <a href="http://demo.bestprestashoptheme.com/savemart/pl/?home=home_3"
                       class="d-flex align-items-center"><img class="img-fluid mr-2" src="../img/l/5.jpg"
                                                              alt="Polski (Polish)" width="16"
                                                              height="11"><span>Polski</span></a>
                </div>
                <div class="item-language">
                    <a href="http://demo.bestprestashoptheme.com/savemart/ar/?home=home_3"
                       class="d-flex align-items-center"><img class="img-fluid mr-2" src="../img/l/6.jpg"
                                                              alt="اللغة العربية (Arabic)" width="16" height="11"><span>اللغة العربية</span></a>
                </div>
            </div>
        </div>

    </div>
</div>


<div id="stickymenu_bottom_mobile" class="d-flex align-items-center justify-content-center hidden-md-up text-center">
    <div class="stickymenu-item"><a href="http://demo.bestprestashoptheme.com/savemart/"><i
                class="zmdi zmdi-home"></i><span>Home</span></a></div>
    <div class="stickymenu-item"><a href="#" class="js-btn-search"><i
                class="zmdi zmdi-search"></i><span>Search</span></a></div>
    <div class="stickymenu-item">
        <div id="_mobile_cart_bottom" class="nov-toggle-page" data-target="#mobile-blockcart"></div>
    </div>
    <div class="stickymenu-item"><a href="login-2.html"><i class="zmdi zmdi-favorite-outline"></i><span>Wishlist</span></a>
    </div>
    <div class="stickymenu-item"><a href="#" class="nov-toggle-page" data-target="#mobile-pageaccount"><i
                class="zmdi zmdi-account-o"></i><span>Account</span></a></div>
</div>


<script type="text/javascript"
        src="{{asset('assets/front/themes/vinova_savemart/assets/cache/bottom-3c96ed23.js')}}"></script>
         
 <!-----------------------------------Begin -sweet alert -------------------------------->
 <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"> </script>
 <script>
            swal("Button in Danger Mode",
                 "ESC and click outside is disable,and time=5sec",
                 "warning", {
                dangerMode: true,
                buttons: true,
                closeOnClickOutside: false,
                timer: 5000,
            });
        </script>
        2222222222222
        <script>
    swal("Are You want To Delete", {
      dangerMode: true,
      buttons: true,
    }    );
  </script> --> 
     <script src="{{asset('assets/custom_js/sweetalert.min.js ')}}"> </script>  
 <script>
    
  
	
	
     @if(Session::has('sweet-alert-msg'))
    var type = "{{ Session::get('sweet-alert-type') }}";
	 swal("{{ Session::get('sweet-alert-msg1') }}!", "{{ Session::get('sweet-alert-msg') }}", type, {
      button: "ok",
  timer: 4000,
    });
	  @endif 
	  
	  
	  
      
                </script>
 <!---------------------------------End---sweet alert -------------------------------->

@yield('scripts')

</body>
</html>
