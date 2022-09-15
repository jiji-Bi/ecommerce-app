@extends('admin.composants.layout')
@include('admin.notifications.ajout')
@include('admin.notifications.edit')
@include('admin.notifications.delete')

@section('content')
    <div class="content">
        <div class="pb-5">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-header ">Liste des Tailles
                        </h2>
                        <div class=" mb-3 mt-3"><a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn btn-primary detail ">
                                Ajouter Taille
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                                @yield('ajout')
                                @yield('edit')
                                @yield('delete')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ref</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">code</th>
                                    <th scope="col">Visibilité</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tailles as $taille)
                                    <tr>
                                        <th scope="row">{{ $taille->id }}</th>
                                        <td>{{ $taille->nom }}</td>
                                        <td>{{ $taille->code }}</td>
                                        <td>{{ $taille->status }}</td>

                                        <td>
                                            {{-- Bouton Modifier --}}
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editTaille{{ $taille->id }}"> <span
                                                    class="fa fa-edit"></span></button>

                                            {{-- Bouton Supprimer --}}
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $taille->id }}"> <span
                                                    class="fa fa-trash"></span></button>

                                            {{-- POPUP SUPPRIMER --}}
                                            <div class="modal fade" id="staticBackdrop{{ $taille->id }}" tabindex="-1"
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
                                                                la taille {{ $taille->nom }}
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="/admin/taille/delete/{{ $taille->id }}"
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
                                            <div class="modal fade" id="editTaille{{ $taille->id }}" tabindex="-1"
                                                aria-labelledby="editTailleLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editTailleLabel">
                                                                Modifier Taille {{ $taille->nom }}
                                                                <button class="btn p-1" type="button"
                                                                    data-bs-dismiss="modal" aria-label="Close"><span
                                                                        class="fas fa-times fs--1"></span></button>
                                                        </div>
                                                        <form method="POST" action="/admin/taille/edit">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="exampleFormControlInput1">Nom
                                                                        taille </label>

                                                                    <input class="form-control" value="{{ $taille->nom }}"
                                                                        id="exampleFormControlInput1" type="text"
                                                                        placeholder="name@example.com" name="nom">

                                                                </div>

                                                                <div class="mb-0">
                                                                    <label class="form-label" for="exampleTextarea">
                                                                        Code taille
                                                                    </label>
                                                                    <textarea name="code" class="form-control" id="exampleTextarea" rows="3">{{ $taille->code }}</textarea>

                                                                </div>

                                                                <div class="mb-3">

                                                                    <label class="form-label" for="exampleTextarea">
                                                                        Visibilité taille </label>
                                                                    <input class="form-control"
                                                                        value="{{ $taille->status }}"
                                                                        id="exampleFormControlInput1" type="number"
                                                                        placeholder="status" name="status">
                                                                </div>

                                                                <input type="hidden" id="exampleFormControlInput1"
                                                                    name="id" value="{{ $taille->id }}">

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

                    {{-- POPUP AJOUT --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter
                                        taille</h5>
                                    <button class="btn p-1" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                </div>
                                <form method="POST" action="/admin/taille/add">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Nom
                                                taille </label>
                                            <input class="form-control" value="{{ @old('nom') }}"
                                                id="exampleFormControlInput1" type="text"
                                                placeholder="name@example.com" name="nom">
                                            @error('nom')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-0">
                                            <label class="form-label" for="exampleTextarea">
                                                Code taille </label>
                                            <textarea name="code" class="form-control" id="exampleTextarea" rows="3">{{ @old('code') }}</textarea>
                                            @error('code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-0">
                                            <label class="form-label" for="exampleTextarea">
                                                Visibilité taille </label>
                                            <input class="form-control" value="{{ @old('$couleur->status ') }}"
                                                id="exampleFormControlInput1" type="number" placeholder="Statut"
                                                name="status">

                                            @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
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
                    <hr />

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
