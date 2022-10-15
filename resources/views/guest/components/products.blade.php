@section('products')
    <div class="row isotope-grid">

        @foreach ($produits as $produit)
            @if (count($produit->variants))
                <input type="hidden" value="{{ $variant = $produit->variants->first() }}">
                <input type="hidden" value="{{ $element = $variant->images->first() }}">
                @if (count($variant->images))
                        <!-- Block2 -->
                @if($view_name=='guest.index')
                    <div class="col-sm-6 col-md-4 col-lg-3 isotope-item lg:grid">
                @elseif($view_name=='guest.components.categories_products')
                    <div class="col-sm-6 col-md-4 col-lg-2 isotope-item lg:grid">
                @endif
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
        @endforeach

    </div>
   
@endsection
