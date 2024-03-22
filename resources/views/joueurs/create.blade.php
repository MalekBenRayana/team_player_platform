@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créer un joueur</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                             <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif


                        <form method="POST" action="{{ route('joueurs.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" name="prenom" id="prenom" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="datenaissance">Date de naissance</label>
                                <input type="date" name="datenaissance" id="datenaissance" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Créer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection