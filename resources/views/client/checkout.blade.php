
@extends('guest.layout')
@section('content')
	
   
   <!-- Header -->
   @include('guest.components.second-header')
   @yield('second-header')

	<!-- Title page -->
	<section class="bg-img0 txt-center p-lr-15 p-tb-100" style="background-image: url('{{asset('Client-assets/images/orders.jpg')}}'">
		<h2 class="ltext-105 cl0 txt-right">
			  Chez JiJi 
		</h2><h2 class="ltext-105 cl0 txt-center">
			Chez JiJi 
	  </h2><h2 class="ltext-105 cl0 txt-left">
		Chez JiJi 
  </h2>
	</section>	


<!-- Content page -->
<livewire:front-office.checkout.checkout>
	
	
 <!-- Footer -->
 @include('guest.components.footer')
 @yield('footer')

 <!-- Back to top arrow  -->
 @include('guest.components.arrow')
 @yield('arrow')

	
@endsection