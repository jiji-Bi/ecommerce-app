@extends('admin.composants.layout')
@section('content')
    <div class="content">
        <div class="pb-5">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-header ">Liste des produits
                        </h2>
                    </div>
                    @if ($message = Session::get('ajout'))
                        {{-- <div class="alert alert-soft-success">{{ $message }}</div> --}}
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
                                //location.reload();
                            }).catch(swal.noop);
                        </script>
                    @endif
                    @if ($message = Session::get('edit'))
                        {{-- <div class="alert alert-soft-success">{{ $message }}</div> --}}
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        <script type="text/javascript">
                            var message = {{ Js::from($message) }};
                            new swal({
                                icon: 'success',
                                title: '',
                                text: message,
                                confirmButtonColor: "#3874ff",
                                timer: 5000
                            }).then((value) => {
                                //location.reload();
                            }).catch(swal.noop);
                        </script>
                    @endif
                    @if ($message = Session::get('delete'))
                        {{-- <div class="alert alert-soft-success">{{ $message }}</div> --}}
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        <script type="text/javascript">
                            var message = {{ Js::from($message) }};
                            new swal({
                                icon: 'success',
                                title: '',
                                text: message,
                                confirmButtonColor: "#3874ff",
                                timer: 5000
                            }).then((value) => {
                                //location.reload();
                            }).catch(swal.noop);
                        </script>
                    @endif
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ref</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produits as $produit)
                                    <tr>
                                        <th scope="row">{{ $produit->id }}</th>
                                        <td>{{ $produit->nom }}</td>
                                        <td>{{ $produit->description }}</td>
                                        <td>{{ $produit->price }}</td>
                                        <td>{{ $produit->stock }}</td>

                                        <td>
                                            {{-- Bouton Modifier --}}
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editProduit{{ $produit->id }}"> <span
                                                    class="fa fa-edit"></span></button>

                                            {{-- Bouton Supprimer --}}
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $produit->id }}"> <span
                                                    class="fa fa-trash"></span></button>


                                            {{-- Bouton Lister --}}
                                            <a href="{{ url('/admin/variants') }}" class="btn btn-primary"><span
                                                    class="fa fa-list"></span></a>

                                            {{-- POPUP SUPPRIMER --}}
                                            <div class="modal fade" id="staticBackdrop{{ $produit->id }}" tabindex="-1"
                                                data-bs-backdrop="static" aria-labelledby="staticBackdropLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <button class="btn p-1" type="button" data-bs-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    class="fas fa-times fs--1 text-white"></span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-700 lh-lg mb-0">Voulez vous supprimer
                                                                le produit {{ $produit->nom }}
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="/admin/produit/delete/{{ $produit->id }}"
                                                                type="button" class="btn btn-primary">
                                                                Confirmer
                                                            </a>
                                                            <button class="btn btn-outline-primary" type="button"
                                                                data-bs-dismiss="modal">Annuler</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            @if (Session::get('error_code') && Session::get('error_code') == 5)
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                @foreach ($produit->images as $img)
                                                    @if ($img->produit_id == $produit->id)
                                                        <script>
                                                            var id = "{{ Js::from($produit->id) }}";
                                                            $(document).ready(function() {
                                                                $('#editProduit' + id).modal('show');
                                                            });
                                                        </script>
                                                    @endif
                                                @endforeach
                                            @endif

                                            {{-- POPUP EDIT --}}
                                            <div class="modal fade" id="editProduit{{ $produit->id }}" tabindex="-1"
                                                aria-labelledby="editCategoryLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editCategoryLabel">
                                                                Modifier Produit
                                                                <button class="btn p-1" type="button"
                                                                    data-bs-dismiss="modal" aria-label="Close"><span
                                                                        class="fas fa-times fs--1"></span>
                                                                </button>
                                                        </div>
                                                        <form method="POST" action="/admin/produit/edit"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">

                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="exampleFormControlInput1">Nom
                                                                        produit </label>

                                                                    <input class="form-control" value="{{ $produit->nom }}"
                                                                        id="exampleFormControlInput1" type="text"
                                                                        placeholder="name@example.com" name="nom">

                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="exampleFormControlInput1">Catégorie
                                                                    </label>
                                                                    <select
                                                                        name="categorie"class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example">
                                                                        @foreach ($categories as $categorie)
                                                                            <option value="{{ $categorie->id }}">
                                                                                {{ $categorie->nom }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-0">
                                                                    <label class="form-label" for="exampleTextarea">
                                                                        Description produit
                                                                    </label>
                                                                    <textarea name="description" class="form-control" id="exampleTextarea" rows="3">{{ $produit->description }}</textarea>

                                                                </div>
                                                                <br>


                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="exampleFormControlInput1">Stock
                                                                        produit </label>

                                                                    <input class="form-control"
                                                                        value="{{ $produit->stock }}"
                                                                        id="exampleFormControlInput1" type="number"
                                                                        placeholder="name@example.com" name="stock">
                                                                    @error('stock')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="exampleFormControlInput1">Tarification
                                                                        produit </label>

                                                                    <input class="form-control"
                                                                        value="{{ $produit->price }}"
                                                                        id="exampleFormControlInput1" type="number"
                                                                        step="0.01" placeholder="name@example.com"
                                                                        name="price">
                                                                    @error('price')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <input type="hidden" id="exampleFormControlInput1"
                                                                    name="id" value="{{ $produit->id }}">

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-primary"
                                                                    type="submit">Confirmer</button><button
                                                                    class="btn btn-outline-primary" type="button"
                                                                    data-bs-dismiss="modal">Annuler</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <footer class="footer">
                    <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
                        <div class="col-12 col-sm-auto text-center">

                        </div>
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600">chez-jiji v1.0</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    @endsection
