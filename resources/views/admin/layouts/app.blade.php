<!DOCTYPE html>
<html lang="fr" class="dark-theme">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin • VinSmoke - @yield('title', 'Tableau de Bord')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome@6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 280px;
            --header-height: 70px;
            --primary-dark: #0f172a;
            --primary-light: #1e293b;
            --accent-gold: #c8a97e;
            --accent-gold-light: #d4b995;
            --text-light: #f8fafc;
            --text-gray: #94a3b8;
            --border-light: rgba(255, 255, 255, 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --border-radius: 12px;
            --shadow-soft: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .dark-theme {
            background-color: var(--primary-dark);
            color: var(--text-light);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-light) 100%);
            min-height: 100vh;
        }

        /* Sidebar Styles */
        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary-light) 100%);
            border-right: 1px solid var(--border-light);
            transition: var(--transition);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid var(--border-light);
        }

        .brand-admin {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--text-light);
            text-decoration: none;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: var(--accent-gold);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-dark);
            font-size: 1.2rem;
        }

        .brand-text {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .sidebar-menu {
            padding: 1.5rem 0;
            list-style: none;
        }

        .sidebar-menu li {
            margin: 0.25rem 0;
        }

        .sidebar-menu a {
            color: var(--text-gray);
            padding: 0.875rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            transition: var(--transition);
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            color: var(--accent-gold);
            background: rgba(200, 169, 126, 0.1);
            border-left-color: var(--accent-gold);
        }

        .sidebar-menu a i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        /* Content Area */
        #content {
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            min-height: 100vh;
        }

        .navbar-admin {
            height: var(--header-height);
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-light);
            padding: 0 1.5rem;
        }

        .main-content {
            padding: 2rem;
            background: transparent;
        }

        /* Card Styles */
        .admin-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-soft);
            transition: var(--transition);
        }

        .admin-card:hover {
            box-shadow: var(--shadow-medium);
            border-color: rgba(200, 169, 126, 0.3);
        }

        .stat-card {
            background: linear-gradient(135deg, var(--primary-light), rgba(30, 41, 59, 0.8));
            border: 1px solid var(--border-light);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--accent-gold), var(--accent-gold-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Button Styles */
        .btn-gold {
            background: linear-gradient(135deg, var(--accent-gold), var(--accent-gold-light));
            color: var(--primary-dark);
            border: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
            color: var(--primary-dark);
        }

        .btn-outline-gold {
            border: 2px solid var(--accent-gold);
            color: var(--accent-gold);
            background: transparent;
            transition: var(--transition);
        }

        .btn-outline-gold:hover {
            background: var(--accent-gold);
            color: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Table Styles */
        .admin-table {
            background: rgba(30, 41, 59, 0.6);
            border-radius: var(--border-radius);
            overflow: hidden;
        }

        .admin-table th {
            background: var(--primary-light);
            color: var(--accent-gold);
            font-weight: 600;
            border: none;
            padding: 1rem;
        }

        .admin-table td {
            border-color: var(--border-light);
            padding: 1rem;
            vertical-align: middle;
        }

        /* Responsive */
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

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--primary-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--accent-gold);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-gold-light);
        }
    </style>

    @stack('styles')
</head>
<body class="dark-theme">
    <!-- Sidebar -->
    <div id="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="brand-admin">
                <div class="brand-icon">
                    <i class="fas fa-wine-glass-alt"></i>
                </div>
                <span class="brand-text">VinSmoke Admin</span>
            </a>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Tableau de Bord</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="fas fa-tags"></i>
                    <span>Catégories</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.dishes.index') }}" class="{{ request()->routeIs('admin.dishes.*') ? 'active' : '' }}">
                    <i class="fas fa-utensils"></i>
                    <span>Plats</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reservations.index') }}" class="{{ request()->routeIs('admin.reservations.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i>
                    <span>Réservations</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i>
                    <span>Galerie</span>
                </a>
            </li>
            <li class="mt-4">
                <a href="{{ route('home') }}" target="_blank" class="text-success">
                    <i class="fas fa-external-link-alt"></i>
                    <span>Voir le Site</span>
                </a>
            </li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-danger">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Déconnexion</span>
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
        <nav class="navbar navbar-admin fixed-top">
            <div class="container-fluid">
                <button class="btn btn-outline-gold d-md-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="d-flex align-items-center ms-auto">
                    <div class="user-info me-3">
                        <small class="text-muted">Connecté en tant que</small>
                        <div class="fw-bold text-light">{{ Auth::user()->name }}</div>
                    </div>
                    <div class="avatar">
                        <div class="avatar-placeholder bg-gold rounded-circle d-flex align-items-center justify-content-center"
                             style="width: 40px; height: 40px;">
                            <i class="fas fa-user text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show admin-card border-success" role="alert" data-aos="fade-down">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle me-2"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show admin-card border-danger" role="alert" data-aos="fade-down">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <div>{{ session('error') }}</div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialisation AOS
        AOS.init({
            duration: 600,
            easing: 'ease-out',
            once: true
        });

        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('active');
        });

        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
