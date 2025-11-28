<header class="navbar navbar-expand-lg navbar-dark fixed-top custom-header">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="{{ route('home') }}">
            <i class="fas fa-wine-glass-alt me-2"></i>VinSmoke
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('menu*') ? 'active' : '' }}" href="{{ route('menu') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Galerie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">À Propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-reservation" href="{{ route('reservation.create') }}">
                        <i class="fas fa-calendar-check me-1"></i>Réserver
                    </a>
                </li>

                <!-- Liens d'authentification -->
                @auth
                    @if(Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-cog me-1"></i>Admin
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-light" style="border: none; background: none;">
                                <i class="fas fa-sign-out-alt me-1"></i>Déconnexion
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <i class="fas fa-sign-in-alt me-1"></i>Connexion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">
                            <i class="fas fa-user-plus me-1"></i>Inscription
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</header>
