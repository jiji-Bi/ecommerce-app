@extends('guest.layout')
@section('content')

   <!-- Header -->
   @include('guest.components.second-header')
   @yield('second-header')

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('Client-assets/images/orders.jpg')}}'">
		<h2 class="ltext-105 cl0 txt-center">
			Mon compte
		</h2>
	</section>	

	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				

			</div>
		</div>
	</section>	
	
	
	<!-- Map -->
	<div class="map">
		<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="{{ asset('Client-assets/images/icons/pin.png') }}" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
	</div>

    <!-- Footer -->
    @include('guest.components.footer')
    @yield('footer')

    <!-- Back to top arrow  -->
    @include('guest.components.arrow')
    @yield('arrow')

@endsection