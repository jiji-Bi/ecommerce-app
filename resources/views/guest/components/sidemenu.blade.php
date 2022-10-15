 @section('sidemenu')
     {{-- Section sidemenu --}}
     <div class="col-md-4 col-lg-3 p-b-80">
         <div class="side-menu">
            @if($view_name=='guest.index')
                {{-- Section categories --}}
                @include('guest.components.categories')
                @yield('categories')
               
                {{-- Section featured products --}}
                @include('guest.components.featured-products')
                @yield('featured-products')
                {{-- Section tags --}}
                @include('guest.components.tags')
                @yield('tags')
            @endif
            @if($view_name=='guest.components.categories_products')
            
            @endif

         </div>
     </div>
 @endsection
