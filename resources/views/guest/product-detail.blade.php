@extends('guest.layout')
@section('content')

   <!-- Header -->
   @include('guest.components.second-header')
   @yield('second-header')
        <!-- Product Detail -->
        <section class="sec-product-detail bg0 p-t-65 p-b-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                                <input type="hidden" value="{{ $imgs = $variants->first()->images }}">
                                @if (Request::has('picture'))
                                    <div class="slick3 gallery-lb">
                                        @foreach ($images as $img)
                                            <div class="item-slick3"
                                                data-thumb="{{ asset('uploads') }}/{{ $img->image }}"width="100">
                                                <div
                                                    class="wrap-pic-w
                                                    pos-relative">
                                                    <img src="{{ asset('uploads') }}/{{ $img->image }}" alt="IMG-PRODUCT">
                                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                        href="{{ asset('uploads') }}/{{ $img->image }}">
                                                        <i class="fa fa-expand"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <input type="hidden" value="{{ $imgs = $variants->first()->images }}">
                                    <div class="slick3 gallery-lb">
                                        @foreach ($imgs as $img)
                                            <div class="item-slick3"
                                                data-thumb="{{ asset('uploads') }}/{{ $img->image }}"width="100">
                                                <div
                                                    class="wrap-pic-w
                                                    pos-relative">
                                                    <img src="{{ asset('uploads') }}/{{ $img->image }}"
                                                        alt="IMG-PRODUCT">
                                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                        href="{{ asset('uploads') }}/{{ $img->image }}">
                                                        <i class="fa fa-expand"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                {{ $produit->nom }}
                                @if (isset($variant))
                                    <input type="hidden" value="{{ $variantdefault = $variant }}">
                                @else
                                    <input type="hidden" value="{{ $variantdefault = $variants->first() }}">
                                @endif                                <div >
                                @if($variantdefault->quantity>0)
                                    <label id="backgroundsd" class="btn-sm py-1 mt-2 text-white bg-success"
                                    style="display: inline">In
                                    Stock</label>
                                @else
                                    <label id="backgroundsd" class="btn-sm py-1 mt-2 text-white bg-danger"
                                    style="display: inline">Out of Stock
                                    </label>
                                @endif
                                </div>
                                            
                            </h4>
                            <span class="mtext-106 cl2">
                                {{ $produit->price }}
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                                {{ $produit->description }}
                            </p>

                            <!--  -->
                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Taille
                                    </div>
                                    @if (isset($variant))
                                        <input type="hidden" value="{{ $variantdefault = $variant }}">
                                    @else
                                        <input type="hidden" value="{{ $variantdefault = $variants->first() }}">
                                    @endif
                                    <div class="size-204 respon6-next">
                                        <form id="myForm" method="Post" action="/client/order/add">
                                            @csrf
                                            <div class="rs1-select2 bor8 bg0">
                                                <select id="sizeselector" class="js-select2" name="taille">
                                                    @foreach ($tailles as $taille)
                                                        <option
                                                            value="{{ $taille->id }}"{{ $taille->id == $variantdefault->taille_id ? 'selected' : '' }}>
                                                            {{ $taille->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>

                                    </div>
                                </div>
                                {{-- solution numero2 --}}
                                @foreach ($firstvalues as $key1 => $values1)
                                    <input type="hidden" value="{{ $i = 0 }}">
                                    @foreach ($values1 as $value1)
                                        @if (isset($i))
                                            @if ($variantdefault->id == $values1[$i]->id)
                                                <input type="hidden" value="{{ $values1 }}">
                                            @endif
                                            <input type="hidden" value="  {{ $i++ }} ">
                                        @endif
                                    @endforeach
                                @endforeach


                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                <script>
                                    $(function() {
                                        $('#sizeselector').on('change', function() {
                                            var formData = parseInt(document.getElementById('sizeselector').value);
                                            var ident = "{{ Js::from($produit->id) }}";
                                            var variant = "{{ Js::from($variantdefault->id) }}";
                                            var quantity = "{{ Js::from($variantdefault->quantity) }}";
                                            var variantsize = "{{ Js::from($variantdefault->taille_id) }}";
                                            var firstvalues = @json($firstvalues);
                                            var values1 = @json($values1);

                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });
                                            $.ajax({
                                                url: '/product/details/'.ident,
                                                method: 'POST',
                                                data: {
                                                    taille: formData,
                                                },
                                                success: function() {
                                                    
                                                    for (first in firstvalues) {
                                                        if (firstvalues[first][0].id == variant) {
                                                            othersizes = firstvalues[first];
                                                            for (othersize in othersizes) {
                                                                if (othersizes[othersize].taille_id === formData) {
                                                                    if (othersizes[othersize].quantity>0 ) {
                                                            
                                                                                const bgsuccess = document.getElementById(
                                                                            'backgroundsd'); 
                                                                             
                                                                            if (bgsuccess.classList.contains("bg-danger"))
                                                                          {
                                                                            bgsuccess.classList.replace("bg-danger", "bg-success");
                                                                            bgsuccess.innerHTML="In Stock"
                                                                          } 
                                                                          else{
                                                                            bgsuccess.classList.replace("bg-success", "bg-success");
                                                                            bgsuccess.innerHTML="In Stock"
                                                                          }
                                                                          document.getElementById('VerifDispo')
                                                                        .disabled = false;  
                                                                        return document.getElementById('VerifDispo')
                                                                        .style.cursor = "pointer";    
                                                                      
                                                                            
                                                                    }       

                                                                else{
                                                                        const bgsuccess = document.getElementById(
                                                                            'backgroundsd'); 
                                                                        if (bgsuccess.classList.contains("bg-success")) 
                                                                        {
                                                                            bgsuccess.classList.replace("bg-success", "bg-danger");
                                                                            bgsuccess.innerHTML="Out of Stock"

                                                                        }   
                                                                        else{
                                                                            bgsuccess.classList.replace("bg-danger", "bg-danger");
                                                                            bgsuccess.innerHTML="Out of Stock"
                                                                        }
                                                                        document.getElementById('VerifDispo')
                                                                        .disabled = true;
                                                                        return document.getElementById('VerifDispo')
                                                                        .style.cursor = "not-allowed";  
                                                                    }
                                                                   
                                                                }
                                                            }
                                                            for (othersize in othersizes) {
                                                                if (othersizes[othersize].taille_id !== formData) {
                                                                    const bgsuccess = document.getElementById(
                                                                            'backgroundsd'); 
                                                                            if (bgsuccess.classList.contains("bg-success"))
                                                                          {
                                                                            bgsuccess.classList.replace("bg-success", "bg-danger");
                                                                            bgsuccess.innerHTML="Size not available"
                                                                          } 
                                                                          else{
                                                                            bgsuccess.innerHTML="Size not available"
                                                                          }
                                                                    document.getElementById('VerifDispo')
                                                                        .disabled = true;
                                                                    return document.getElementById('VerifDispo')
                                                                        .style.cursor = "not-allowed";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    if (variantsize == formData) {
                                                        const bgsuccess = document.getElementById(
                                                        'backgroundsd'); 
                                                        if (bgsuccess.classList.contains("bg-danger"))
                                                        {
                                                            if(quantity>0)
                                                            {
                                                            bgsuccess.classList.replace("bg-danger", "bg-success");
                                                            bgsuccess.innerHTML="In Stock"
                                                            document.getElementById('VerifDispo')
                                                            .disabled = false;
                                                            return document.getElementById('VerifDispo')
                                                            .style.cursor = "pointer";
                                                            }
                                                            else
                                                            {
                                                            bgsuccess.classList.replace("bg-danger", "bg-danger");
                                                            bgsuccess.innerHTML="Out of Stock"
                                                            document.getElementById('VerifDispo')
                                                            .disabled = true;
                                                             return document.getElementById('VerifDispo')
                                                            .style.cursor = "not-allowed";
                                                            }
                                                        } 
                                                        
                                                    }
                                                    //formData = parseInt(document.getElementById('sizeselector').value);
                                                    if (variantsize != formData) {
                                                        const bgsuccess = document.getElementById(
                                                        'backgroundsd'); 
                                                        if (bgsuccess.classList.contains("bg-success"))
                                                        {
                                                        bgsuccess.classList.replace("bg-success", "bg-danger");
                                                        bgsuccess.innerHTML="Size not available"
                                                        } 
                                                        else{
                                                        bgsuccess.innerHTML="Size not available"
                                                        }
                                                        document.getElementById('VerifDispo')
                                                            .disabled = true;
                                                        return document.getElementById('VerifDispo')
                                                            .style.cursor = "not-allowed";

                                                    }
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <script> 
                                document.addEventListener("DOMContentLoaded", function () {
                                    const bgsuccess = document.getElementById('backgroundsd');
                                    if (bgsuccess.classList.contains("bg-danger") && (bgsuccess.innerHTML.includes("Out of Stock")))
                                    { 
                                      document.getElementById('VerifDispo').disabled = true;
                                      return document.getElementById('VerifDispo').style.cursor = "not-allowed";
                                                            
                                    } 
                                });
                                   
                                </script> 

                                   <script> 
                                    document.addEventListener("DOMContentLoaded", function () {
                                        windows.livewire.on('urlchanged',param=>{
                                            history.pushState(null,null,`${document.location.pathname}?${param}`);
                                        });
                                    });
                                    </script>
                                <br>
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Couleur:
                                    </div>
                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor0 bg0">
                                            <input type="hidden"
                                                value="{{ $couleurdefault = $variants->first()->couleur }}">
                                            <strong>
                                                {{ Request::has('picture') ? $currentCouleur[0]->nom : $couleurdefault->nom }}
                                            </strong>

                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-section-images ">
                                    @if (isset($variants))
                                        @foreach ($distinct_variants as $key => $value1)
                                            @if ($value1['total'] == 1)
                                                @foreach ($variants as $variant)
                                                    @if ($value1['couleur_id'] == $variant->couleur_id && $value1['produit_id'] == $variant->produit_id)
                                                        <div class="product-section-thumbnail">
                                                            <input type="hidden"
                                                                value="{{ $variant_f_image = $variant->images->first() }}">
                                                            <input name="picture" type="hidden"
                                                                value="{{ $variant->id }}">
                                                            <a
                                                                href="{{ request()->fullUrlWithQuery(['picture' => $variant->id]) }}">
                                                                <img src="{{ asset('uploads') }}/{{ $variant_f_image->image }}"
                                                                    width="50" alt="IMG-PRODUCT">
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                        @foreach ($variants as $variant)
                                            @foreach ($firstvalues as $key1 => $value)
                                                @if ($firstvalues[$key1][0]->id == $variant->id)
                                                    <div class="product-section-thumbnail">
                                                        <input type="hidden"
                                                            value="{{ $variant_f_image = $variant->images->first() }}">
                                                        <a
                                                            href="{{ request()->fullUrlWithQuery(['picture' => $variant->id]) }}">
                                                            <img src="{{ asset('uploads') }}/{{ $variant_f_image->image }}"
                                                                width="50" alt="IMG-PRODUCT">
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endif
                                </div>
                                <br>
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">

                                            <input type="hidden" name="nomproduct" value="{{ $produit->id }}">
                                            <input type="hidden"
                                                value="{{ $couleurdefault = $variants->first()->couleur->id }}">
                                            <input type="hidden" name="couleurvariant"
                                                value="{{ Request::has('picture') ? $currentCouleur[0]->id : $couleurdefault }}">
                                            
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>
                                            <input id="maxquantity" readonly class="mtext-104 cl3 txt-center num-product" type="number"
                                                name="numproduct" value="1">
                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>

                                        </div>
                                        <button  
                                            class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail pointer"
                                            id="VerifDispo" style="cursor: pointer;">
                                            Add to Cart
                                        </button>
                                        
                                    </div>
                                </div>
                                </form>

                            </div>

                            <br>
                            <br>

                            <!--  -->
                            <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                <div class="flex-m bor9 p-r-10 m-r-11">
                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                        data-tooltip="Add to Wishlist">
                                        <i class="zmdi zmdi-favorite"></i>
                                    </a>
                                </div>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                    data-tooltip="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                    data-tooltip="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                    data-tooltip="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bor10 m-t-50 p-t-43 p-b-40">
                    <!-- Tab01 -->
                    <div class="tab01">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item p-b-10">
                                <a class="nav-link active" data-toggle="tab" href="#description"
                                    role="tab">Description</a>
                            </li>

                            <li class="nav-item p-b-10">
                                <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional
                                    information</a>
                            </li>

                            <li class="nav-item p-b-10">
                                <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews
                                    ({{ count($produit->reviews) }})</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-t-43">
                            <!-- - -->
                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                <div class="how-pos2 p-lr-15-md">
                                    <p class="stext-102 cl6">
                                        {{ $produit->description}}
                                    </p>
                                </div>
                            </div>

                            <!-- - -->
                            <div class="tab-pane fade" id="information" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                        <ul class="p-lr-28 p-lr-15-sm">
                                            <li class="flex-w flex-t p-b-7">
                                                <span class="stext-102 cl3 size-205">
                                                    Weight
                                                </span>

                                                <span class="stext-102 cl6 size-206">
                                                    0.79 kg
                                                </span>
                                            </li>

                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- - -->
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                        <div class="p-b-30 m-lr-15-sm">
                                            <!-- Review -->
                                            @foreach ($produit->reviews as $review)
                                                <div class="flex-w flex-t p-b-68">
                                                    <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                        <img src="{{ asset('Client-assets/images/avatar-01.jpg') }}"
                                                            alt="AVATAR">
                                                    </div>

                                                    <div class="size-207">
                                                        <div class="flex-w flex-sb-m p-b-17">
                                                            <span class="mtext-107 cl2 p-r-20">
                                                                {{ $review->user->name }}
                                                                <small><i>{{ $review->created_at }}</i></small>
                                                            </span>
                                                            <input type="hidden"
                                                                value="{{ $rating = $review->rating }}">
                                                            <span class="fs-18 cl11">

                                                                @while ($rating > 0)
                                                                    @if ($rating > 0.5)
                                                                        <i class="zmdi zmdi-star"></i>
                                                                    @else
                                                                        <i class="zmdi zmdi-star-half"></i>
                                                                    @endif
                                                                    @php $rating=$rating-1; @endphp
                                                                @endwhile
                                                            </span>
                                                        </div>

                                                        <p class="stext-102 cl6">
                                                            {{ $review->review }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            {{-- Addedtocart --}}
                                            {{-- <div class="alert alert-soft-success">{{ $message }}</div> --}}
                                            @if ($message = Session::get('addpanier'))
                                                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                <script type="text/javascript">
                                                    var message = {{ Js::from($message) }};
                                                    new swal({
                                                        icon: 'success',
                                                        confirmButtonColor: "#3874ff",
                                                        title: '',
                                                        text: message,
                                                        timer: 5000
                                                    }).then((value) => {
                                                        document.getElementById("clickme").click();
                                                        //location.reload();
                                                    }).catch(swal.noop);
                                                    
                                                </script>
                                             @endif
                                            {{-- Warning --}}
                                            @if ($message = Session::get('warning'))
                                                {{-- <div class="alert alert-soft-success">{{ $message }}</div> --}}
                                                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                                <script type="text/javascript">
                                                    var message = {{ Js::from($message) }};
                                                    new swal({
                                                        icon: 'warning',
                                                        confirmButtonColor: "#3874ff",
                                                        title: '',
                                                        text: message,
                                                        timer: 5000
                                                    }).then((value) => {
                                                        //location.reload();
                                                    }).catch(swal.noop);
                                                    
                                                </script>
                                            @endif
                                             {{-- Failure --}}
                                            @if ($message = Session::get('failure'))
                                                {{-- <div class="alert alert-soft-success">{{ $message }}</div> --}}
                                                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                                <script type="text/javascript">
                                                    var message = {{ Js::from($message) }};
                                                    new swal({
                                                        icon: 'error',
                                                        confirmButtonColor: "#3874ff",
                                                        title: '',
                                                        text: message,
                                                        timer: 5000
                                                    }).then((value) => {
                                                        //location.reload();
                                                    }).catch(swal.noop);
                                                    
                                                </script>
                                            @endif
                                            <!-- Add review -->
                                            <form action="/client/review/add" method="POST">
                                                @csrf
                                                <h5 class="mtext-108 cl2 p-b-7">
                                                    Add a review
                                                </h5>

                                                <label class="rating-label pointer">
                                                    <input class="rating" max="5" name="valueAsNumber"
                                                        oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)"
                                                        step="0.5" style="--value:2.5" type="range"
                                                        value="2.5">
                                                </label>


                                                <div class="row p-b-25">
                                                    <div class="col-12 p-b-5">
                                                        <label class="stext-102 cl3" for="review">Your
                                                            review</label>
                                                        <textarea name="content" class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                                <button type="submit"
                                                    class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
                <span class="stext-107 cl6 p-lr-25">
                    SKU: {{ $produit->nom }}
                </span>

                <span class="stext-107 cl6 p-lr-25">
                    {{  $produit->category->nom }}
                </span>
            </div>
        </section>


        <!-- Related Products -->
        <section class="sec-relate-product bg0 p-t-45 p-b-105">
            <div class="container">
                <div class="p-b-45">
                    <h3 class="ltext-106 cl5 txt-center">
                        Related Products
                    </h3>
                </div>

                <!-- Slide2 -->
                <div class="wrap-slick2">
                    <div class="slick2">
                        @foreach ($related as $prod)
                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                <!-- Block2 -->
                                <div class="block2">
                                    <input type="hidden" value="{{ $variant = $prod->variants->first() }}">
                                    <input type="hidden" value="{{ $element = $variant->images->first() }}">
                                    <div class="block2-pic hov-img0 ">
                                        <img src="{{ asset('uploads') }}/{{ $element->image }}" alt="IMG-PRODUCT" height="390"
                                        width="50">

                                        <a href="#"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="/product/details/{{ $prod->id }}"
                                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                {{ $prod->nom }}
                                            </a>

                                            <span class="stext-105 cl3">
                                                {{ $prod->price }}
                                            </span>
                                        </div>

                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                <img class="icon-heart1 dis-block trans-04"
                                                    src="{{ asset('Client-assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                    src="{{ asset('Client-assets/images/icons/icon-heart-02.png') }}"
                                                    alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        @include('guest.components.footer')
        @yield('footer')

        <!-- Back to top arrow  -->
        @include('guest.components.arrow')
        @yield('arrow')

        
    @endsection
