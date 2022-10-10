 @section('header')
     <!-- Header -->
     <header class="header-v3">
        
         <!-- Header desktop -->
         <div class="container-menu-desktop trans-03">
             <div class="wrap-menu-desktop">
                 <nav class="limiter-menu-desktop p-l-45">

                     <!-- Logo desktop -->
                     <a href="/" class="logo">
                         <img src="{{ asset('Client-assets/images/icons/chezjiji-blanc.png') }}" width="130"alt="IMG-LOGO">
                     </a>

                     <!-- Menu desktop -->
                     <div class="menu-desktop">
                         <ul class="main-menu">
                             <li>
                                 <a href="/">Home</a>
                             </li>

                             <li>
                                 <a href="/blog">Blog</a>
                             </li>

                             <li>
                                 <a href="/about">About</a>
                             </li>

                             <li>
                                 <a href="/contact">Contact</a>
                             </li>
                             <li>
                                
                            </li>  
                         </ul>
                     </div>

                     <!-- Icon header -->
                     <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <nav class="navbar navbar-expand-md navbar-dark ">
                            <div class="container">
                                
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                
                
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
                        
                        <livewire:front-office.cart.cart-count2  />


                         <div class="flex-c-m h-full p-lr-19">
                             <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                                 <i class="zmdi zmdi-menu"></i>
                             </div>
                         </div>
                         
                       
                     </div>
                 </nav>
             </div>
         </div>

         <!-- Header Mobile -->
         <div class="wrap-header-mobile">
             <!-- Logo moblie -->
             <div class="logo-mobile">
                 <a href="index.html"><img src="{{ asset('CLient-assets/images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
             </div>

             <!-- Icon header -->
             <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
                 <div class="flex-c-m h-full p-r-5">
                     <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                         data-notify="2">
                         <i class="zmdi zmdi-shopping-cart"></i>
                     </div>
                 </div>
             </div>

             <!-- Button show menu -->
             <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                 <span class="hamburger-box">
                     <span class="hamburger-inner"></span>
                 </span>
             </div>
         </div>


         <!-- Menu Mobile -->
         <div class="menu-mobile">
             <ul class="main-menu-m">
                 <li>
                     <a href="index.html">Home</a>
                     <ul class="sub-menu-m">
                         <li><a href="index.html">Homepage 1</a></li>
                         <li><a href="home-02.html">Homepage 2</a></li>
                         <li><a href="home-03.html">Homepage 3</a></li>
                     </ul>
                     <span class="arrow-main-menu-m">
                         <i class="fa fa-angle-right" aria-hidden="true"></i>
                     </span>
                 </li>

                 <li>
                     <a href="product.html">Shop</a>
                 </li>

                 <li>
                     <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
                 </li>

                 <li>
                     <a href="blog.html">Blog</a>
                 </li>

                 <li>
                     <a href="about.html">About</a>
                 </li>

                 <li>
                     <a href="/contact">Contact</a>
                 </li>
             </ul>
         </div>

         <!-- Modal Search -->
         <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
             <button class="flex-c-m btn-hide-modal-search trans-04">
                 <i class="zmdi zmdi-close"></i>
             </button>

             <form class="container-search-header">
                 <div class="wrap-search-header">
                     <input class="plh0" type="text" name="search" placeholder="Search...">

                     <button class="flex-c-m trans-04">
                         <i class="zmdi zmdi-search"></i>
                     </button>
                 </div>
             </form>
         </div>
     </header>
 @endsection
