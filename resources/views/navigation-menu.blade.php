<!-- NavigationMenu.blade.php -->
<div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" href="{{ route('home') }}">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            @if(Auth::user()->joueur)
                                <a class="nav-link" href="{{ route('joueurs.interface', ['joueur' => Auth::user()->joueur->idjoueur]) }}">Mon Espace</a>
                            @else
                                <a class="nav-link" >Mon Espace</a>
                            @endif
                        </li>
                    @endauth
                    
                </ul>

                <ul class="navbar-nav ml-auto">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" x-ref="form">
                            @csrf
                            <a class="nav-link" href="#" @click.prevent="$refs.form.submit()">Déconnexion</a>
                        </form>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.show') }}">Profil</a>
                        </li>

                        <li class="nav-item">
                        <form class="d-flex" action="{{ route('joueurs.search') }}" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Rechercher joueurs" aria-label="Rechercher" name="search">
                        </form>
                    </li>
                        
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</div>
