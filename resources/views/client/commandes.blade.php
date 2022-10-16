@extends('guest.layout')
@section('content')
	
   
   <!-- Header -->
   @include('guest.components.second-header')
   @yield('second-header')

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('Client-assets/images/orders.jpg')}}'">
		<h2 class="ltext-105 cl0 txt-center">
			Mes Commandes
		</h2>
	</section>	


<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        
    </div>
</section>	
	
	
 <!-- Footer -->
 @include('guest.components.footer')
 @yield('footer')

 <!-- Back to top arrow  -->
 @include('guest.components.arrow')
 @yield('arrow')

	
@endsection