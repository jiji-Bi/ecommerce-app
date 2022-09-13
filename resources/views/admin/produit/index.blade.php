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
                                    aria-selected="false">Déclinaisons produit</button>
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
                                        <div class="container">
                                            <div class="card mt-3">
                                                <div class="card-header">

                                                </div>
                                                <div class="card-body">

                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    @if (Session::has('success'))
                                                        <div class="alert alert-success text-center">
                                                            <a href="#" class="close" data-dismiss="alert"
                                                                aria-label="close">×</a>
                                                            <p>{{ Session::get('success') }}</p>
                                                        </div>
                                                    @endif
                                                    <table class="table table-bordered" id="dynamicAddRemove">
                                                        <tr>
                                                            <th>Nom</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Couleur</th>
                                                            <th>Taille</th>
                                                            <th>Images</th>
                                                            <th> </th>

                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" name="moreFields[0][nom]"
                                                                    placeholder="Enter title" class="form-control" />
                                                                @error('nom')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </td>
                                                            <td><input type="number" step="0.01"
                                                                    name="moreFields[0][price]" placeholder="Enter title"
                                                                    class="form-control" />
                                                                @error('price')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </td>
                                                            <td><input type="number" name="moreFields[0][quantity]"
                                                                    placeholder="Enter title" class="form-control" />

                                                            </td>
                                                            <td><input type="number" name="moreFields[0][couleur_id]"
                                                                    placeholder="Enter title" class="form-control" />
                                                                @error('couleur_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </td>
                                                            <td><input type="number" name="moreFields[0][taille_id]"
                                                                    placeholder="Enter title" class="form-control" />
                                                                @error('taille_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input class="form-control" id="exampleFormControlInput1"
                                                                    multiple type="file" placeholder="name@example.com"
                                                                    name="images[]">
                                                            </td>
                                                            <td><button type="button" name="add" id="add-btn"
                                                                    class="btn btn-primary">Add More</button>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
                                        <script type="text/javascript">
                                            var i = 0;
                                            $("#add-btn").click(function() {
                                                ++i;
                                                $("#dynamicAddRemove").append('<tr><td><input type="text" name="moreFields[' + i +
                                                    '][nom]" placeholder="Enter your Name" class="form-control" /></td><td><input type="number" step="0.01" name="moreFields[' +
                                                    i +
                                                    '][price]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="number"  name="moreFields[' +
                                                    i +
                                                    '][quantity]" placeholder="Enter your Price" class="form-control" /></td><td><input type="number" name="moreFields[' +
                                                    i +
                                                    '][couleur_id]" placeholder="Enter your color" class="form-control" /></td> <td><input type="number" name="moreFields[' +
                                                    i +
                                                    '][taille_id]" placeholder="Enter your size" class="form-control" /></td>     <td><input multiple type="file" class="form-control" id="exampleFormControlInput1" name = "images[]"></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
                                                );
                                            });
                                            $(document).on('click', '.remove-tr', function() {
                                                $(this).parents('tr').remove();
                                            });
                                        </script>
                                    </div>

                                </div>

                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary detail">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
            <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-900">Thank you for creating with phoenix<span
                        class="d-none d-sm-inline-block"></span><span class="mx-1">|</span><br class="d-sm-none">2022
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
