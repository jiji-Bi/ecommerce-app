@section('categories')
    <div class="p-t-55">
        <h4 class="mtext-112 cl2 p-b-33">
            Categories
        </h4>
        @foreach ($categories as $categorie)
            <ul>
                <li class="bor18">
                    <a href="/product/{{ $categorie->nom }}/list" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                        {{ $categorie->nom }}
                    </a>
                </li>

            </ul>
        @endforeach
    </div>
@endsection
