<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Restaurant Élégant'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|playfair-display:400,500,600,700,900" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fallback CSS -->
    <style>
        :root {
            --primary-dark: #1a1a1a;
            --primary-light: #2d2d2d;
            --accent-gold: #c8a97e;
            --accent-gold-light: #d4b995;
            --accent-gold-dark: #b8945f;
            --text-light: #f8f9fa;
            --text-gray: #6c757d;
            --text-dark: #2c2c2c;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
            background: white;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }

        /* Header de secours */
        .custom-header {
            background: var(--primary-dark) !important;
            padding: 1rem 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            width: 100%;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .brand-wrapper {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: var(--accent-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-dark);
        }

        .brand-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent-gold);
            font-family: 'Playfair Display', serif;
        }

        .nav-link {
            color: white !important;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: rgba(200, 169, 126, 0.1);
        }

        .btn-reservation {
            background: var(--accent-gold);
            color: var(--primary-dark) !important;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-reservation:hover {
            background: var(--accent-gold-dark);
            transform: translateY(-2px);
        }

        main {
            margin-top: 80px;
            min-height: calc(100vh - 80px);
        }

        .flex { display: flex; }
        .items-center { align-items: center; }
        .justify-between { justify-content: space-between; }
        .hidden { display: none; }

        @media (max-width: 768px) {
            .lg-hidden { display: none; }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="custom-header">
        <nav class="container">
            <div class="flex items-center justify-between">
                <!-- Brand -->
                <a href="{{ url('/') }}" class="brand-wrapper">
                    <div class="brand-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div class="brand-text">Restaurant Élégant</div>
                </a>

                <!-- Desktop Navigation -->
                <div class="lg-hidden flex items-center space-x-2">
                    <a href="{{ url('/') }}" class="nav-link">Accueil</a>
                    <a href="{{ url('/menu') }}" class="nav-link">Menu</a>
                    <a href="{{ url('/about') }}" class="nav-link">À Propos</a>

                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link">Tableau de Bord</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Connexion</a>
                        <a href="{{ route('register') }}" class="nav-link">Inscription</a>
                    @endauth
                </div>

                <!-- Reservation Button -->
                <a href="{{ url('/reservation') }}" class="btn-reservation">
                    <i class="fas fa-calendar-check mr-2"></i>
                    Réserver
                </a>

                <!-- Mobile menu button -->
                <button class="lg:hidden text-white text-2xl" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="lg:hidden hidden mt-4">
                <div class="flex flex-col space-y-2">
                    <a href="{{ url('/') }}" class="nav-link">Accueil</a>
                    <a href="{{ url('/menu') }}" class="nav-link">Menu</a>
                    <a href="{{ url('/about') }}" class="nav-link">À Propos</a>

                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link">Tableau de Bord</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Connexion</a>
                        <a href="{{ route('register') }}" class="nav-link">Inscription</a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container">
        @yield('content')
    </main>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.custom-header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(26, 26, 26, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = 'var(--primary-dark)';
                header.style.backdropFilter = 'none';
            }
        });
    </script>
</body>
</html>
