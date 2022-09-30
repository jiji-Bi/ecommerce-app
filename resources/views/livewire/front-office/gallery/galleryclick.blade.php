<div>
    <input type="hidden" value="{{ $variant_f_image = $variant->images->first() }}">
    <div wire:click.debounce.500ms="update({{ $variant }})">
        <img src="{{ asset('uploads') }}/{{ $variant_f_image->image }}" width="50" alt="IMG-PRODUCT">
        </a>
    </div>
</div>
