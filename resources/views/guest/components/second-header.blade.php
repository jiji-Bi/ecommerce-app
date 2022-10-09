 @section('second-header')
 <!-- Header -->
 <header class="header-v4">
       <!-- Topbar -->
       <div class="top-bar">
        <div class="content-topbar flex-sb-m h-full container">
            <div class="left-top-bar">
                Free shipping for standard order over $100
            </div>

            <div class="right-top-bar flex-w h-full">
                <a href="#" class="flex-c-m trans-04 p-lr-25">
                    Help & FAQs
                </a>

                <a href="/client/dashboard" class="flex-c-m trans-04 p-lr-25">
                    My Account
                </a>

                <a href="#" class="flex-c-m trans-04 p-lr-25">
                    EN
                </a>

                <a href="#" class="flex-c-m trans-04 p-lr-25">
                    USD
                </a>
            </div>
        </div>
        </div>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        
        <div class="wrap-menu-desktop how-shadow1">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <img src="{{ asset('Client-assets/images/icons/chez-jiji-noir.png') }}"
                        width="130"alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="/">Home</a>
                        </li>

                        <li class="label1" data-label1="hot">
                            <a href="/blog">Blog</a>
                        </li>

                        <li>
                            <a href="/about">About</a>
                        </li>

                        <li>
                            <a href="/contact">Contact</a>
                        </li>
                        
                    </ul>
               </div>
              
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div id="clickme"class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                        data-notify="3">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                        data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                    <nav class="navbar navbar-expand-md navbar-light bg-white ">
                        <div class="container">
                            
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>
            
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav me-auto">
            
                                </ul>
            
                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif
            
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>
            
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
            
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </nav>
        </div>
     
      
    </div>

    
    <!-- Cart -->
    <div id="clickme">
    <livewire:front-office.cart.shop-cart  />
    </div>
    
</header>
@endsection