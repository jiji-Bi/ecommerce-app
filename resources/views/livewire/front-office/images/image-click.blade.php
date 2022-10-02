<div>
    <input type="hidden" value="{{ $variant_f_image = $variant->images->first() }}">
    <input name="picture" type="hidden" value="{{ $variant->id }}">
    <div wire:click="update({{ $variant }})">
        <img src="{{ asset('uploads') }}/{{ $variant_f_image->image }}" width="50" alt="IMG-PRODUCT">
    </div>
</div>
