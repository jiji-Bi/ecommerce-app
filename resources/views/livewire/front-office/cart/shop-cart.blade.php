<div>
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>
                   

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>
            @php
            $totalprice = 0;
            @endphp
            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    @if(Auth::check())
                    @if (count($commande) != 0) 
                            @foreach($commande[0]->items as $item)
                            <li class="header-cart-item flex-w flex-t m-b-12">
                                <div class="header-cart-item-img">
                                        <img src="{{ asset('uploads') }}/{{ $item->variant->images->first()->image }}"
                                            alt="IMG">
                                </div>
        
                                <div class="header-cart-item-txt p-t-8">
                                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        {{$item->variant->name}}
                                    </a>
        
                                    <span wire:key="{{ $item->id }}" class="header-cart-item-info">
                                        {{  $item->quantity  }} X {{$item->variant->prix}}            
                
                                    </span>
                                </div>
                            </li>
        
                                @php
                                $totalprice += $item->variant->prix * $item->quantity;
                                @endphp
        
                            @endforeach
                        @else
                            <span class="mtext-101 cl5">
                                Ajoutez des articles dans votre panier  @ JijiStore 
                            </span> 
                        @endif

                    @else
                          
                   <span class="mtext-101 cl5">
                        Votr panier  @ JijiStore est vide
                    </span> 
                    @endif
                 
                </ul>
            </div>
                <div class="w-full">   
               @if(Auth::check())
                    @if (count($commande) != 0) 

                        <div class="header-cart-total w-full p-tb-40">
                            Total:  {{ $totalprice }} TND
                        </div>
                            <div class="header-cart-buttons flex-w w-full">
                                <a href="/client/cart"
                                    class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                                    View Cart
                                </a>

                                <a href="/client/checkout"
                                    class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                                    Check Out
                                </a>
                            </div>

                    @endif

                </div>
                @else
            
                <li class="p-b-13">
                    <a href="/login" class="stext-102 cl2 hov-cl1 trans-04">
                        Login
                    </a>
                </li>
                <li class="p-b-13">
                    <a href="/register" class="stext-102 cl2 hov-cl1 trans-04">
                        Register
                    </a>
                </li>
                @endif
         
        </div>
    </div>

</div>
