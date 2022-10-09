
@extends('layouts.app')
@section('content')
<!-- Header -->
<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
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
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop how-shadow1">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="/" class="logo">
                    <img src="{{ asset('Client-assets/images/icons/chez-jiji-noir.png') }}"
                        width="130"alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="/">Home</a>
                        </li>

                        <li>
                            <a href="">Blog</a>
                        </li>

                        <li>
                            <a href="">About</a>
                        </li>

                        <li>
                            <a href="">Contact</a>
                        </li>
                     
                            <li >
                                <a href="/login">Login</a>
                            </li>        
                            <li>
                                <a href="/register">Register</a>
                            </li>                  
 
                    </ul>
                </div>

                <!-- Icon header -->
                
            </nav>
        </div>
    </div>
</header>

            <div class="container">
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card py-3 px-2">
                            <p class="text-center mb-3 mt-2">SE CONNECTER AVEC</p>
                            <div class="row mx-auto ">
                                <div class="col-4">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-facebook"></i>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-google"></i>
                                </div>
                            </div>
                            <div class="division">
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-6"><span>OU AVEC MON EMAIL</span></div>
                                    <div class="col-3"></div>
                                </div>
                            </div>
                       
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
               
      
      
@endsection
