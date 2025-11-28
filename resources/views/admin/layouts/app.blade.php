<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin VinSmoke - @yield('title', 'Dashboard')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome@6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 250px;
            --header-height: 60px;
            --primary-color: #8B4513;
            --secondary-color: #D4AF37;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            background: #2c3e50;
            color: white;
            transition: all 0.3s;
        }

        #content {
            margin-left: var(--sidebar-width);
            transition: all 0.3s;
        }

        .sidebar-header {
            padding: 20px;
            background: #34495e;
        }

        .sidebar-menu {
            padding: 0;
            list-style: none;
        }

        .sidebar-menu li {
            padding: 0;
        }

        .sidebar-menu a {
            color: #bdc3c7;
            padding: 15px 20px;
            display: block;
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            color: white;
            background: #34495e;
            border-left: 4px solid var(--secondary-color);
        }

        .sidebar-menu a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .navbar-custom {
            height: var(--header-height);
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .main-content {
            padding: 20px;
            margin-top: var(--header-height);
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-left: 4px solid var(--primary-color);
        }

        .stat-card .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -var(--sidebar-width);
            }

            #content {
                margin-left: 0;
            }

            #sidebar.active {
                margin-left: 0;
            }

            #content.active {
                margin-left: var(--sidebar-width);
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <div id="sidebar">
        <div class="sidebar-header">
            <h4 class="mb-0">
                <i class="fas fa-wine-glass-alt me-2"></i>VinSmoke Admin
            </h4>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="fas fa-tags"></i>Catégories
                </a>
            </li>
            <li>
                <a href="{{ route('admin.dishes.index') }}" class="{{ request()->routeIs('admin.dishes.*') ? 'active' : '' }}">
                    <i class="fas fa-utensils"></i>Plats
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reservations.index') }}" class="{{ request()->routeIs('admin.reservations.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i>Réservations
                </a>
            </li>
            <li>
                <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i>Galerie
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}" target="_blank">
                    <i class="fas fa-external-link-alt"></i>Voir le site
                </a>
            </li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div id="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-custom fixed-top">
            <div class="container-fluid">
                <button class="btn btn-primary d-md-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="ms-auto">
                    <span class="navbar-text">
                        <i class="fas fa-user me-2"></i>{{ Auth::user()->name }}
                    </span>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('active');
        });
    </script>

    @stack('scripts')
</body>
</html>
