@extends('admin.composants.layout')
@section('content')
<div class="content">
    <div class="pb-5">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-header ">Ajouter vos couleurs
                    </h2>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="true">Détails couleur</button>
                        </li>

                    </ul>
                    <form method="POST" action="/admin/couleur/add" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab" tabindex="0">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Nom
                                        couleur </label>
                                    <input class="form-control" value="{{ @old('nom') }}"
                                        id="exampleFormControlInput1" type="text"
                                        placeholder="name@example.com" name="nom">
                                    @error('nom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-0">
                                    <label class="form-label" for="exampleTextarea">
                                        Code couleur </label>
                                    <input name="code" class="form-control colorpicker" id="exampleTextarea" rows="3">
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-0">
                                    <label class="form-label" for="exampleTextarea">
                                        Visibilité couleur </label>
                                    <input class="form-control" value="{{ @old('$couleur->status ') }}"
                                        id="exampleFormControlInput1" type="number" placeholder="Statut"
                                        name="status">

                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                               <br>

                            </div>
                           
                        </div>
                        <div>
                                <button type="submit" class="btn btn-primary detail">Submit</button>
                        </div>
                        @section('javascript')
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
                        <script>
                            $('.colorpicker').colorpicker();
                        </script>
                    @stop
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<footer class="footer">
    <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
        <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 text-900">Thank you for creating with phoenix<span class="d-none d-sm-inline-block"></span><span class="mx-1">|</span><br class="d-sm-none">2022
                &copy; <a href="https://themewagon.com">Themewagon</a>
            </p>
        </div>
        <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 text-600">v1.1.0</p>
        </div>
    </div>
</footer>
@endsection