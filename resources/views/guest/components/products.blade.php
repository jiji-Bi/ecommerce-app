@section('products')
@if($view_name=="guest.index")
<livewire:front-office.products.products />
@else
<livewire:front-office.products.products2 />
@endif

@endsection