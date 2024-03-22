<!-- resources/views/joueurs/interface.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Interface du Joueur</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Nom:</strong> {{ $joueur->nom }}</p>
                <p><strong>Prénom:</strong> {{ $joueur->prenom }}</p>

                <p><strong>Date de Naissance:</strong> {{ \Carbon\Carbon::parse($joueur->datenaissance)->format('j-m-Y') }}</p>

                @if(Auth::id() === $joueur->id)
                    <div class="mb-3">
                        <form action="{{ route('joueurs.edit', ['idjoueur' => $joueur->idjoueur]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Modifier mon espace</button>
                        </form>
                    </div>

                    <form action="{{ route('joueurs.destroy', ['idjoueur' => $joueur->idjoueur]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer mon espace</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
