<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>@yield("title") - KLOUD TRANSACT || Ecommerce store</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/site.css"/>
	
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css"/>
    <!-- End WOWSlider.com HEAD section -->
	
	@yield("styles")
	
	 <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
   
</head>
<body>

    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="{{url('/')}}"><img src="img/kloudlogo.PNG" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>
		
        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
               <a href="{{url('/')}}"><img src="img/kloudlogo.PNG" alt=""></a>
            </div>
            <?php
              $welcomeText = (isset($user) && $user != null) ? $user->fname: "Guest";
            ?>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="#">Welcome, {{$welcomeText}}!</a></li>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('top-deals')}}">Top Deals</a></li>
                    <li><a href="{{url('auction')}}">Kloud Auctions</a></li>
                    <li><a href="{{url('bundle')}}">Bundle Products</a></li>
                     <li><a href="{{url('kloudpay')}}">KloudPay</a></li>
                     <li><a href="{{url('enterprise')}}">Enterprise</a></li>
                    @if($user != null) 
                    <li><a href="{{url('dashboard')}}">Dashboard</a></li>                  
                    <li><a href="{{url('transactions')}}">Transactions</a></li>
                    <li><a href="{{url('orders')}}">Orders</a></li>
                    <li><a href="{{url('logout')}}">Log out</a></li>
                    @else
                    <li><a href="{{url('register')}}">Register</a></li>
                    <li><a href="{{url('login')}}">Log in</a></li>
                    @endif                  
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
            	<?php
                  $wu = "#"; $wt = "New this week"; 
                  if($user != null && $user->role != "user"){
                  	$wu = url('cobra'); $wt = "Admin center"; 
                  }
                  $cc = (isset($cart)) ? count($cart) : 0;
            	?>
                <a href="{{$wu}}" class="btn amado-btn active">{{$wt}}</a>
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="{{url('cart')}}" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>({{$cc}})</span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="{{url('checkout')}}" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Checkout</a>              
                <a href="{{url('about')}}" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> About Us</a>                                           
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">               
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->
        
		
    <?php
	  $mc = (isset($mainClass) && $mainClass != null) ? $mainClass : "products-catagories-area clearfix"; 
	?>
	<script>console.log("{{$mc}}")</script>
	    @yield("ShopSideBar")
    <div class='{{$mc}}'>
        <!--------- Cookie consent-------------->
        	@include('cookie-consent')
        
        <!--------- Session notifications-------------->
        	<?php
               $pop = ""; $val = "";
               
               if(isset($signals))
               {
                  foreach($signals['okays'] as $key => $value)
                  {
                    if(session()->has($key))
                    {
                  	$pop = $key; $val = session()->get($key);
                    }
                 }
              }
              
             ?> 

                 @if($pop != "" && $val != "")
                   @include('session-status',['pop' => $pop, 'val' => $val])
                 @endif
        	<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ['errors'=>$errors])
                     @endif 
                     
        <main role="main" class="pb-3">
            @yield("content")
        </main>
    </div>

   </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe to our <span>newsletter</span></h2>
                        <p>We will only notify you of new deals, we won't spam your email. </p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->
	
   <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50" style="background: #fbb710; padding: 5px;">
                           <a href="{{url('/')}}"><img src="img/kloudlogo.PNG" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Licensed under CC BY 3.0. --
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Colorlib</a>
-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="{{url('/')}}">KloudTransact</a> - <a href="{{url('faq')}}">FAQ</a> | Site powered by <a href="#" target="_blank">Disenado NG</a>
</p>

                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{url('/')}}">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('faq')}}">FAQ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('about')}}">About Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('cart')}}">Cart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('checkout')}}">Checkout</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->
	


    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

    <script src="js/site.js" ></script>

    @yield("scripts")
</body>
</html>
