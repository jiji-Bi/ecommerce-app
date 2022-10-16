@extends('admin.composants.layout')
@section('content')
    <div class="content">
        <div class="pb-5">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-header ">Modifier vos produits
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
                        <form method="POST" action="{{ url('/admin/produit/' . $produit->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-details" role="tabpanel"
                                    aria-labelledby="pills-details-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nom
                                            produit </label>

                                        <input class="form-control" value="{{ $produit->nom }}"
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
                                                <option
                                                    value="{{ $categorie->id }}"{{ $categorie->id == $produit->category->id ? 'selected' : '' }}>
                                                    {{ $categorie->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-0">
                                        <label class="form-label" for="exampleTextarea">
                                            Description produit
                                        </label>
                                        <textarea name="description" class="form-control" id="exampleTextarea" rows="3">{{ $produit->description }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Stock
                                            produit </label>
                                        <input class="form-control" value="{{ $produit->stock }}"
                                            id="exampleFormControlInput1" type="number" placeholder="name@example.com"
                                            name="stock">
                                        @error('stock')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Tarification
                                            produit </label>

                                        <input class="form-control" value="{{ $produit->price }}"
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
                                                    <h5>Ajoutez d'autres variants </h5>
                                                </div>
                                                <div class="card-body">
                                                  
                         
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
                                                            
                                                            <td>
                                                                    <input id="name" type="text" class="form-control{{ $errors->has('moreFields.0.name') ? ' is-invalid' : '' }}" 
                                                                    name="moreFields[0][name]" value="{{ old('moreFields.0.name') }}"  />
                                                                    @error('moreFields.0.name')
                                                                    <span class="text-danger">{{ substr($message,17);}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>

                                                                <input id="prix" type="number" step="0.01" class="form-control{{ $errors->has('moreFields.0.prix') ? ' is-invalid' : '' }}"
                                                                name="moreFields[0][prix]" value="{{ old('moreFields.0.prix') }}" />
                                                                @error('moreFields.0.prix')
                                                                <span class="text-danger">{{ substr($message,17);}}</span>
                                                            @enderror
                                                            </td>
                                                             <td>  
                                                               
                                                                <input id="quantity" type="number"  class="form-control{{ $errors->has('moreFields.0.quantity') ? ' is-invalid' : '' }}"
                                                                name="moreFields[0][quantity]" value="{{ old('moreFields.0.quantity') }}" />
                                                                @error('moreFields.0.quantity')
                                                                <span class="text-danger">{{ substr($message,17);}}</span>
                                                            @enderror
                                                          </td>
                                                            <td>
                                                                <select name="couleur" class="form-select form-select-sm" aria-label="form-select-sm example">
                                                                    @foreach ($couleurs as $couleur)
                                                                    <option value="{{ $couleur->id }}">
                                                                        {{ $couleur->nom }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('couleur')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <select name="taille" class="form-select form-select-sm" aria-label="form-select-sm example">
                                                                    @foreach ($tailles as $taille)
                                                                    <option value="{{ $taille->id }}">
                                                                        {{ $taille->nom }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('taille')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </td>
                                                        
                                                            <td>
                                                                <input name="images[0][]" class="form-control" id=""
                                                                multiple type="file" placeholder="name@example.com"
                                                                >
                                                                @error('images')
                                                                <span class="text-danger">{{ $message}}</span>
                                                                @enderror
                                                                    
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
                                                var html = '';
                                                html += '<tr>';
                                                html +=
                                                    '<td><input type="text" name="moreFields[' + i +
                                                    '][name]" placeholder="Enter your Name" class="form-control" /> @error("moreFields.0.name")<span class="text-danger">{{ substr($message,17);}}</span>@enderror</td>';
                                                html +=
                                                    '<td><input type="number" name="moreFields[' + i +
                                                    '][quantity]" placeholder="Enter your Name" class="form-control" />@error("moreFields.0.quantity")<span class="text-danger">{{ substr($message,17);}}</span>@enderror</td>';
                                                html +=
                                                    '<td><input type="number" step="0.01" name="moreFields[' + i +
                                                    '][prix]" placeholder="Enter your Name" class="form-control" />@error("moreFields.0.prix")<span class="text-danger">{{ substr($message,17);}}</span>@enderror</td>';
                                                
                                                html +=
                                                '<td><select name="couleur" class="form-select form-select-sm" aria-label="form-select-sm example"> @foreach ($couleurs as $couleur)<option value="{{ $couleur->id }}">{{ $couleur->nom }}</option>@endforeach</select></td>'
                                            
                                                html +=
                                                    '<td><select name="taille" class="form-select form-select-sm" aria-label="form-select-sm example"> @foreach ($tailles as $taille)<option value="{{ $taille->id }}">{{ $taille->nom }}</option>@endforeach</select></td>'
                                                html +=
                                                '<td><input multiple type="file" class="form-control" id="exampleFormControlInput1" name ="images['+i+'][]" >@error("images")<span class="text-danger">{{ $message}}</span>@enderror</td>';
                                                html +=
                                                '<td><button type="button" name="remove" class="btn btn-danger remove-tr"><span class="glyphicon glyphicon-minus">Remove</span></button></td></tr>';
                                                    $("#dynamicAddRemove").append(html)
                                            }
                                                );
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
