<!-- resources/views/joueurs/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Modifier l'Espace Joueur</h1>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('joueurs.update', ['idjoueur' => $joueur->idjoueur]) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom :</label>
                        <input type="text" name="nom" class="form-control" value="{{ $joueur->nom }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom :</label>
                        <input type="text" name="prenom" class="form-control" value="{{ $joueur->prenom }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="datenaissance" class="form-label">Date de Naissance :</label>
                        <input type="date" name="datenaissance" class="form-control" value="{{ $joueur->datenaissance }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
@endsection
