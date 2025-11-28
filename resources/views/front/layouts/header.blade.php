<header class="navbar navbar-expand-lg navbar-dark fixed-top custom-header" data-aos="fade-down">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <div class="brand-wrapper">
                <div class="brand-icon">
                    <i class="fas fa-wine-glass-alt"></i>
                </div>
                <span class="brand-text">VinSmoke</span>
            </div>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <span class="nav-icon"><i class="fas fa-home"></i></span>
                        <span class="nav-text">Accueil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('menu*') ? 'active' : '' }}" href="{{ route('menu') }}">
                        <span class="nav-icon"><i class="fas fa-utensils"></i></span>
                        <span class="nav-text">Notre Carte</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">
                        <span class="nav-icon"><i class="fas fa-images"></i></span>
                        <span class="nav-text">Galerie</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        <span class="nav-icon"><i class="fas fa-star"></i></span>
                        <span class="nav-text">L'Expérience</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                        <span class="nav-icon"><i class="fas fa-map-marker-alt"></i></span>
                        <span class="nav-text">Contact</span>
                    </a>
                </li>
            </ul>

            <!-- CTA Buttons -->
            <div class="navbar-actions">
                <a href="{{ route('reservation.create') }}" class="btn btn-reservation">
                    <i class="fas fa-calendar-check me-2"></i>
                    Réserver
                </a>

                <!-- Auth Links -->
                @auth
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm ms-2">
                            <i class="fas fa-cog"></i>
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="d-inline ms-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm ms-2">
                        <i class="fas fa-user"></i>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>
