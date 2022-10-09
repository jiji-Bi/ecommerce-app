@extends('guest.layout')
@section('content')
    <!-- Header -->
    @include('guest.components.header')
    @yield('header')
    <!-- Sidebar -->
    @include('guest.components.sidebar')
    @yield('sidebar')

   <!-- Cart -->
   <livewire:front-office.cart.shop-cart  />

    <!-- Slider -->
    @include('guest.components.slider')
    @yield('slider')

    <!-- Banner -->
    @include('guest.components.banner')
    @yield('banner')

    {{-- Section contenue --}}
    @include('guest.components.contenue')
    @yield('contenue')
    <!-- Footer -->
    @include('guest.components.footer')
    @yield('footer')

    <!-- Back to top arrow  -->
    @include('guest.components.arrow')
    @yield('arrow')

    <!-- Product quick-view Modal -->
    @include('guest.components.product-quick-view')
    @yield('quick-view')
@endsection
