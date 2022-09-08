 @section('sidemenu')
     {{-- Section sidemenu --}}
     <div class="col-md-4 col-lg-3 p-b-80">
         <div class="side-menu">
             <div class="bor17 of-hidden pos-relative">
                 @include('guest.components.search')
                 @yield('search')
                 <button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                     <i class="zmdi zmdi-search"></i>
                 </button>
             </div>
             {{-- Section categories --}}
             @include('guest.components.categories')
             @yield('categories')
             {{-- Section featured products --}}
             @include('guest.components.featured-products')
             @yield('featured-products')
             {{-- Section tags --}}
             @include('guest.components.tags')
             @yield('tags')
         </div>
     </div>
 @endsection
