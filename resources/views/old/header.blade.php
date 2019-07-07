    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 d-flex justify-content-between">
                        <!-- Logo Area -->
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="img/core-img/logo.png" alt=""></a>
                        </div>

                        <!-- Top Contact Info -->
                        <div class="top-contact-info d-flex align-items-center">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Althanstrabe, 1090 Vienna, Alsergrund, Austria"><img src="img/core-img/placeholder.png" alt=""> <span>Althanstrabe, 1090 Vienna Alsergrund, Austria</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="customer_care@theogilbn.com"  style="margin-right: 30px;"><img src="img/core-img/message.png" alt=""> <span>customer_care@theogilbn.com</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Click here to sign in" id="login-btn"><img src="img/core-img/placeholder.png" alt=""> <span>Welcome, Guest!</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="credit-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="creditNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('about')}}">About Us</a></li>
                                    <li><a href="{{url('services')}}">Services</a></li>
                                    <li><a href="#">Portfolio</a>
                                        <ul class="dropdown">
                                            <li><a href="{{url('credit-cards')}}">Credit Cards</a></li>
                                            <li><a href="{{url('international-banking')}}">International Banking</a></li>
                                            <li><a href="{{url('corporate-businesses')}}">Corporate Business</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{url('faq')}}">FAQ</a></li>
                                    <li><a href="{{url('contact')}}">Contact</a></li>
                                    @if($user == null)
                                     <li><a href="#">Welcome, Guest! </a>
                                        <ul class="dropdown">
                                            <li><a href="{{url('login')}}">Sign in</a></li>
                                            <li><a href="{{url('register')}}">Create account</a></li>
                                        </ul>
                                    </li>
                                    @else
                                    @if($user->role == "superadmin")
                                    <li><a href="{{url('cobra')}}">Admin Dashboard</a></li>
                                    @elseif(($user->role == "admin" || $user->role == "user") && ($user->status != "pending"))
                                    <li><a href="{{url('dashboard')}}">Dashboard</a></li>                            
                                    @endif                  
                                    <li><a href="{{url('logout')}}">Logout</a></li>
                                    @endif
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Contact -->
                        <div class="contact">
                            <a href="#"><img src="img/core-img/call2.png" alt=""> +43 720 817 689</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->