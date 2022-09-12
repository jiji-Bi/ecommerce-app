@extends('admin.composants.layout')
@section('content')
    <div class="content">
        <div class="pb-5">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-header ">Gestion des produits
                        </h2>

                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-details-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-details" type="button" role="tab"
                                    aria-controls="pills-details" aria-selected="true">Détails produit</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-image-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-image" type="button" role="tab" aria-controls="pills-image"
                                    aria-selected="false">Images produit</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-colors-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-colors" type="button" role="tab"
                                    aria-controls="pills-colors" aria-selected="false">Couleurs produit</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-sizes-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-sizes" type="button" role="tab" aria-controls="pills-sizes"
                                    aria-selected="false">Tailles produit</button>
                            </li>
                        </ul>
                        <form method="POST" action="/admin/produit/add" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-details" role="tabpanel"
                                    aria-labelledby="pills-details-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nom
                                            produit </label>

                                        <input class="form-control" value="{{ @old('nom') }}"
                                            id="exampleFormControlInput1" type="text" placeholder="name@example.com"
                                            name="nom">
                                        @error('nom')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Catégorie </label>
                                        <select name="categorie"class="form-select form-select-sm"
                                            aria-label="form-select-sm example">
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-0">
                                        <label class="form-label" for="exampleTextarea">
                                            Description produit
                                        </label>
                                        <textarea name="description" class="form-control" id="exampleTextarea" rows="3">{{ @old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Stock
                                            produit </label>

                                        <input class="form-control" value="{{ @old('stock') }}"
                                            id="exampleFormControlInput1" type="number" placeholder="name@example.com"
                                            name="stock">
                                        @error('stock')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Tarification
                                            produit </label>

                                        <input class="form-control" value="{{ @old('price') }}"
                                            id="exampleFormControlInput1" type="number" step="0.01"
                                            placeholder="name@example.com" name="price">
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-image" role="tabpanel"
                                    aria-labelledby="pills-image-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">
                                            Sélectionnez les images de votre produit
                                        </label>

                                        <input class="form-control" id="exampleFormControlInput1" multiple type="file"
                                            placeholder="name@example.com" name="images[]">

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-colors" role="tabpanel"
                                    aria-labelledby="pills-colors-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">
                                            Cochez les tailles de votre produit
                                        </label> <br>

                                        <div class="row">
                                            @forelse ($couleurs as $couleur)
                                                <div class="col-md-3">
                                                    <div class="p-2 border mb-3">

                                                        Couleur: <input type="checkbox" value="{{ $couleur->id }}"
                                                            name="colors[{{ $couleur->id }}]" />
                                                        {{ $couleur->nom }}
                                                        <br>
                                                        Quantité: <input type="number"
                                                            name="quantity[{{ $couleur->id }}]"
                                                            style="width:50px; border:1px solid" />
                                                    </div>


                                                </div>
                                            @empty
                                                <div class="col-md-12">
                                                    <h1>Aucune couleur ajouté</h1>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="pills-sizes" role="tabpanel"
                                    aria-labelledby="pills-sizes-tab" tabindex="0">

                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary detail">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <footer class="footer">
                <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-900">Thank you for creating with phoenix<span
                                class="d-none d-sm-inline-block"></span><span class="mx-1">|</span><br
                                class="d-sm-none">2022
                            &copy; <a href="https://themewagon.com">Themewagon</a>
                        </p>
                    </div>
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-600">v1.1.0</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    </div>
@endsection
