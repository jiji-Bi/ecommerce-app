@extends('admin.composants.layout')
@section('content')
    <div class="content">
        <div class="pb-5">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-header ">Liste des variants
                        </h2>
                    </div>
                    @if ($message = Session::get('ajout'))
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
                                    <th scope="col">Prix</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Couleur</th>
                                    <th scope="col">Taille</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($variants as $variant)
                                    <tr>
                                        <th scope="row">{{ $variant->id }}</th>
                                        <td>{{ $variant->name }}</td>
                                        <td>{{ $variant->prix }}</td>
                                        <td>{{ $variant->quantity }}</td>
                                        <td>{{ $variant->couleur->nom }}</td>
                                        <td>{{ $variant->taille_id }}</td>
                                        <td>
                                            @if (count($variant->images))
                                                @foreach ($variant->images as $img)
                                                    <img src="{{ asset('uploads') }}/{{ $img->image }}" width="100">
                                                @endforeach
                                            @else
                                                <h5>pas d'images ajoutés</h5>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- Bouton Modifier --}}
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editVariant{{ $variant->id }}"> <span
                                                    class="fa fa-edit"></span></button>

                                            {{-- Bouton Supprimer --}}
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $variant->id }}"> <span
                                                    class="fa fa-trash"></span></button>

                                            {{-- POPUP SUPPRIMER --}}
                                            <div class="modal fade" id="staticBackdrop{{ $variant->id }}" tabindex="-1"
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
                                                                le variant {{ $variant->nom }}
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="/admin/variant/delete/{{ $variant->id }}"
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
                                                @foreach ($variant->images as $img)
                                                    @if ($img->variant_id == $variant->id)
                                                        <script>
                                                            var id = "{{ Js::from($variant->id) }}";
                                                            $(document).ready(function() {
                                                                $('#editVariant' + id).modal('show');
                                                            });
                                                        </script>
                                                    @endif
                                                @endforeach
                                            @endif

                                            {{-- POPUP EDIT --}}
                                            <div class="modal fade" id="editVariant{{ $variant->id }}" tabindex="-1"
                                                aria-labelledby="editVariantLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editVariantLabel">
                                                                Modifier Variant
                                                                <button class="btn p-1" type="button"
                                                                    data-bs-dismiss="modal" aria-label="Close"><span
                                                                        class="fas fa-times fs--1"></span>
                                                                </button>
                                                        </div>
                                                        <form method="POST" action="/admin/variant/edit"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">

                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="exampleFormControlInput1">Nom
                                                                        variant </label>

                                                                    <input class="form-control" value="{{ $variant->nom }}"
                                                                        id="exampleFormControlInput1" type="text"
                                                                        placeholder="name@example.com" name="nom">

                                                                </div>

                                                                <br>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="exampleFormControlInput1">Images
                                                                        variant </label>
                                                                    <br>
                                                                    <input class="form-control"
                                                                        id="exampleFormControlInput1" multiple
                                                                        type="file" placeholder="name@example.com"
                                                                        name="images[]">
                                                                    <br>
                                                                    @if (count($variant->images))
                                                                        <center>
                                                                            @foreach ($variant->images as $img)
                                                                                <div class="photos-container">
                                                                                    <img src="{{ asset('uploads') }}/{{ $img->image }}"
                                                                                        style="width: 80px;height:80px"
                                                                                        class="me-4 border">
                                                                                    <a class="photo"
                                                                                        href="{{ url('/admin/variant-image') . '/' . $img->id . '/delete' }}">Remove</a>

                                                                                </div>
                                                                            @endforeach
                                                                            <center />
                                                                        @else
                                                                            <h5> pas d'images ajoutés </h5>
                                                                    @endif   
                                                                    @error('images[]')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="exampleFormControlInput1">Quantité
                                                                        variant </label>

                                                                    <input class="form-control"
                                                                        value="{{ $variant->quantity }}"
                                                                        id="exampleFormControlInput1" type="number"
                                                                        placeholder="name@example.com" name="quantity">
                                                                    @error('quantity')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="exampleFormControlInput1">Tarification
                                                                        produit </label>

                                                                    <input class="form-control"
                                                                        value="{{ $variant->price }}"
                                                                        id="exampleFormControlInput1" type="number"
                                                                        step="0.01" placeholder="name@example.com"
                                                                        name="price">
                                                                    @error('price')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <input type="hidden" id="exampleFormControlInput1"
                                                                    name="id" value="{{ $variant->id }}">
                                                                <input type="hidden" id="exampleFormControlInput1"
                                                                    name="images[]" value="{{ $variant->images }}">
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
