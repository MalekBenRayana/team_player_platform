@extends('layouts.app')

@section('content')
    <a href="{{ route('joueurs.create') }}" class="btn btn-success mb-4">Créer votre espace joueur</a>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($joueurs as $joueur)
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $joueur->nom }} {{ $joueur->prenom }}</h5>
                        <p class="card-text">Date de Naissance: {{ \Carbon\Carbon::parse($joueur->datenaissance)->format('j-m-Y') }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <form method="POST" action="{{ route('joueurs.like', ['idjoueur' => $joueur->idjoueur]) }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fas fa-heart"></i> J'aime
                            </button>
                        </form>
                        <span class="badge bg-info text-white">{{ $joueur->likes_count }} Likes</span>
                        <a href="{{ route('joueurs.interface', ['joueur' => $joueur->idjoueur]) }}" class="btn btn-outline-primary">Consulter joueur</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-12">Aucun joueur trouvé.</p>
        @endforelse
    </div>

    <div class="mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $joueurs->links('pagination::bootstrap-4') }}
            </ul>
        </nav>
    </div>
@endsection
