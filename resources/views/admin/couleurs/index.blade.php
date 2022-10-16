@extends('admin.composants.layout')
@section('content')
    <div class="content">
        <div class="pb-5">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-header ">Liste des couleurs
                        </h2>
                        <div class=" mb-3 mt-3"><a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn btn-primary detail ">
                                Ajouter couleur
                            </a>
                        </div>
                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="1">ref</th>
                                    <th colspan="1">Nom</th>
                                    <th colspan="1">code</th>                               
                                    <th colspan="1" width="28px" >Couleur</th>
                                    <th colspan="1"><center>Visibilité </center></th>
                                    <th colspan="1">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($message = Session::get('alerte'))
                                    <div class="alert alert-success">{{ $message }}</div>
                                @endif
                                @foreach ($couleurs as $couleur)
                                    <tr>
                                        <th scope="row">{{ $couleur->id }}</th>
                                        <td>{{ $couleur->nom }}</td>
                                        <td>{{ $couleur->code }}</td>
                                        <td style="background-color:{{ $couleur->code }}"></td>
                                        <td><center>{{ $couleur->status }}</center></td>

                                        <td>
                                            {{-- Bouton Modifier --}}
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editCouleur{{ $couleur->id }}"> <span
                                                    class="fa fa-edit"></span></button>

                                            {{-- Bouton Supprimer --}}
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $couleur->id }}"> <span
                                                    class="fa fa-trash"></span></button>

                                            {{-- POPUP SUPPRIMER --}}
                                            <div class="modal fade" id="staticBackdrop{{ $couleur->id }}" tabindex="-1"
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
                                                                la couleur {{ $couleur->nom }}
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="/admin/couleur/delete/{{ $couleur->id }}"
                                                                type="button" class="btn btn-primary">
                                                                Confirmer
                                                            </a>
                                                            <button class="btn btn-outline-primary" type="button"
                                                                data-bs-dismiss="modal">Annuler</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- POPUP EDIT --}}
                                            <div class="modal fade" id="editCouleur{{ $couleur->id }}" tabindex="-1"
                                                aria-labelledby="editCouleurLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editCouleurLabel">
                                                                Modifier Couleur {{ $couleur->nom }}
                                                                <button class="btn p-1" type="button"
                                                                    data-bs-dismiss="modal" aria-label="Close"><span
                                                                        class="fas fa-times fs--1"></span></button>
                                                        </div>
                                                        <form method="POST" action="/admin/couleur/edit">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="exampleFormControlInput1">Nom
                                                                        couleur </label>

                                                                    <input class="form-control" value="{{ $couleur->nom }}"
                                                                        id="exampleFormControlInput1" type="text"
                                                                        placeholder="name@example.com" name="nom">

                                                                </div>

                                                                <div class="mb-0">
                                                                    <label class="form-label" for="exampleTextarea">
                                                                        Code couleur
                                                                    </label>
                                                                    <textarea name="code" class="form-control" id="exampleTextarea" rows="3">{{ $couleur->code }}</textarea>

                                                                </div>

                                                                <div class="mb-3">

                                                                    <label class="form-label" for="exampleTextarea">
                                                                        Visibilité couleur </label>
                                                                    <input class="form-control"
                                                                        value="{{ $couleur->status }}"
                                                                        id="exampleFormControlInput1" type="number"
                                                                        placeholder="status" name="status">
                                                                </div>

                                                                <input type="hidden" id="exampleFormControlInput1"
                                                                    name="id" value="{{ $couleur->id }}">

                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit">Confirmer
                                                                    </button>

                                                                    <button class="btn btn-outline-primary" type="button"
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
