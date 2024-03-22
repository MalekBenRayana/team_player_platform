<!-- joueurs/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Carte du Joueur</h1>
    

    @auth
        @if(!auth()->user()->likedJoueurs->contains($joueur))
            <form method="POST" action="{{ route('joueurs.like', ['idjoueur' => $joueur->idjoueur]) }}">
                @csrf
                <button type="submit">Like</button>
            </form>
        @else
            <p>Vous avez déjà aimé ce joueur.</p>
        @endif
    @else
        <p>Connectez-vous pour aimer ce joueur.</p>
    @endauth
@endsection
