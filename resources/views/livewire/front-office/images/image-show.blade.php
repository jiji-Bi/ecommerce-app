<div class="slick3 gallery-lb">
    @foreach ($images as $img)
        <div class="item-slick3" data-thumb="{{ asset('uploads') }}/{{ $img->image }}"width="100">
            <div class="wrap-pic-w    pos-relative">
                <img src="{{ asset('uploads') }}/{{ $img->image }}" alt="IMG-PRODUCT">
                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                    href="{{ asset('uploads') }}/{{ $img->image }}">
                    <i class="fa fa-expand"></i>
                </a>
            </div>
        </div>
    @endforeach
</div>
