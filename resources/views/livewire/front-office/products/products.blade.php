<div>

<div class="flex-w flex-sb-m p-b-52">    

                            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                                <a href="/" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                                    All Products
                                </a>
                                @foreach($fivecategories as $categorie)
                                    <a href="/product/{{ $categorie->nom }}/list" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                                        {{ $categorie->nom }}
                                    </a>
                                @endforeach
                            </div>

                            

                            <div class="flex-w flex-c-m m-tb-10">
                                <div
                                    class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                                    Filter
                                </div>

                                <div
                                    class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                                    Search
                                </div>
                            </div>

                            <!-- Search product -->
                            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                                <div class="bor8 dis-flex p-l-15">
                                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>

                                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
                                        placeholder="Search">
                                </div>
                            </div>

                            <!-- Filter -->
                            <div class="dis-none panel-filter w-full p-t-10">
                                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                                    <div class="filter-col1 p-r-15 p-b-27">
                                        <div class="mtext-102 cl2 p-b-15">
                                            Sort By
                                        </div>

                                        <ul>
                                            <li class="p-b-6">
                                                <a href="#" class="filter-link stext-106 trans-04">
                                                    Price: Low to High
                                                </a>
                                            </li>

                                            <li class="p-b-6">
                                                <a href="#" class="filter-link stext-106 trans-04">
                                                    Price: High to Low
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="filter-col2 p-r-15 p-b-27">
                                        <div class="mtext-102 cl2 p-b-15">
                                            Price
                                        </div>
                                        <ul>
                                            <li class="p-b-6">
                                            <a href="/" class="filter-link stext-106 trans-04 filter-link-active">
                                                All
                                            </a>
                                            </li>
                                            @foreach($produits as $produit)
                                            <li class="p-b-6">
                                                <a href="#" class="filter-link stext-106 trans-04">

                                                    @if (isset($produit->variants))
                                                    {{ $produit->variants->first()->prix }} TND - {{$produit->variants->last()->prix }} TND
                                                @endif
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        
                                    </div>

                                    <div class="filter-col3 p-r-15 p-b-27">
                                        <div class="mtext-102 cl2 p-b-15">
                                            Color
                                        </div>

                                        <ul>
                                            @foreach($couleurs as $couleur)
                                            <li class="p-b-6">
                                               
                                                    <span class="fs-15 lh-12 m-r-6" style="color:{{ $couleur->code }}">
                                                        
                                                      <input style="display: inline" type="checkbox" value= "{{ $couleur->nom }}" wire:model="ColorFilters" class="filter-link stext-106 trans-04" /> {{ $couleur->nom }} <i class="zmdi zmdi-circle"></i>
                                                    
                                                    </span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="filter-col4 p-b-27">
                                        <div class="mtext-102 cl2 p-b-15">
                                            Tags
                                        </div>

                                        <div class="flex-w p-t-4 m-r--5">
                                            <a href="#"
                                                class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                                Fashion
                                            </a>

                                            <a href="#"
                                                class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                                Lifestyle
                                            </a>

                                            <a href="#"
                                                class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                                Denim
                                            </a>

                                            <a href="#"
                                                class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                                Streetstyle
                                            </a>

                                            <a href="#"
                                                class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                                Crafts
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
</div>    
<div class="row isotope-grid">

    @foreach ($produits as $produit)              

        @if (isset($produit->variants))
            @if (count($produit->variants))
                @foreach ( $produit->variants as $variant)
                @if(count($colorfilter)!=0)
                @foreach($colorfilter as $color)
                    @if ($variant->couleur->nom ==  $color) 
                        <input  type="hidden" value="{{ $element = $variant->images->first() }}">               
                    @endif
                @endforeach
            @else            
                <input  type="hidden" value="{{ $variant = $produit->variants->first() }}">
                <input   type="hidden" value="{{ $element = $variant->images->first() }}">
            @endif
            @endforeach
               
            @if (count($variant->images))
                    <!-- Block2 -->
            
            <div class="col-sm-6 col-md-4 col-lg-3 isotope-item lg:grid">
            

        
                    <div class="block2">
                        @if($variant->created_at->toDateString() == $mytime->toDateString())
                        
                        <div class="img block2-pic hov-img0 label-new" data-label="New">
                        @else
                        <div class="img block2-pic hov-img0 " >

                        @endif
                            <img src="{{ asset('uploads') }}/{{ $element->image }}" alt="IMG-PRODUCT">
                            <a href="#"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="/product/details/{{ $produit->id }}"
                                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $produit->nom }}
                                </a>

                                <span class="stext-105 cl3">
                                    {{ $produit->price }}
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04"
                                        src="{{ asset('Client-assets/images/icons/icon-heart-01.png') }}"
                                        alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                        src="{{ asset('Client-assets/images/icons/icon-heart-02.png') }}"
                                        alt="ICON">
                                </a>
                            </div>
                        </div>
                        </div>
                </div>
            @endif
        @endif
        @endif

    @endforeach
    

</div>
{{-- {{  $produits->links() }} --}}

</div>

</div>



