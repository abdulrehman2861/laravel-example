<header id="header" class="site-header header-style-1">
            <nav class="navigation navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('index') }}"><img src="assets/images/AutoGlassWiper.gif" alt="Animated GIF"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navigation-holder navbar-right">
                        <button class="close-navbar"><i class="ti-close"></i></button>
                        <ul class="nav navbar-nav">
                            <li class="menu-item-has-children">
                                <a href="{{ route('index') }}">Home</a>

                            </li>
                            <li><a href="{{ route('aboutus') }}">about</a></li>
                            <li class="menu-item-has-children">
                                <a href="{{ route('services-single') }}">Services</a>

                            </li>
                            <li class="menu-item-has-children">
                            <a href="#">User</a>
                                <ul class="sub-menu">
                                    <!-- <li><a href="{{ route('myaccount') }}">Account</a></li> -->

                                    <li><a href="{{ route('shopingCart') }}">Cart</a></li>
                                    <li><a href="{{ route('shop') }}">CheckOut</a></li>
                                </ul>

                            </li>
                            <li>
                                @if (auth()->check())
                                    <a href="{{ route('customer.dashboard.home') }}">Account</a>
                                @else
                                    <a href="{{ route('customer.login') }}">Login</a>
                                @endif

                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ route('blog') }}">Blog</a>

                            </li>
                            <li><a href="{{ route('contectus') }}">Contact</a></li>
                        </ul>
                    </div><!-- end of nav-collapse -->
                    <div class="search-quote">
                        <div class="header-search-area">
                            <div class="header-search-form">
                                <form class="form">
                                    <div>
                                        <input type="text" class="form-control" placeholder="Search here">
                                    </div>
                                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div>
                                <button class="btn open-btn" style="box-shadow:none !important" ><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div><!-- end of container -->
            </nav>
        </header>
        <!-- end of header -->
