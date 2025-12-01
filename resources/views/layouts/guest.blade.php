<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Restaurant Élégant') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|playfair-display:400,500,600,700,900" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .auth-background {
            background: linear-gradient(135deg,
                rgba(26, 26, 26, 0.9) 0%,
                rgba(26, 26, 26, 0.7) 50%,
                rgba(26, 26, 26, 0.9) 100%),
                url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
        }

        .auth-card {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-strong);
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <!-- Loading Spinner -->
    <div class="loading-spinner" id="loadingSpinner">
        <div class="flex flex-col items-center">
            <div class="w-16 h-16 border-4 border-accent-gold border-t-transparent rounded-full animate-spin mb-4"></div>
            <p class="text-white text-lg">Chargement...</p>
        </div>
    </div>

    <div class="min-h-screen auth-background flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <!-- Brand Logo -->
        <div class="brand-wrapper mb-8">
            <div class="brand-icon mx-auto mb-4">
                <i class="fas fa-utensils text-2xl"></i>
            </div>
            <div class="brand-text text-3xl text-center">Restaurant Élégant</div>
        </div>

        <!-- Auth Card -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 auth-card rounded-2xl overflow-hidden">
            {{ $slot }}
        </div>

        <!-- Back to Home -->
        <div class="mt-8 text-center">
            <a href="{{ url('/') }}" class="text-accent-gold hover:text-accent-gold-light transition-colors font-semibold inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Retour à l'accueil
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hide loading spinner
            setTimeout(() => {
                const spinner = document.getElementById('loadingSpinner');
                if (spinner) {
                    spinner.style.display = 'none';
                }
            }, 1000);
        });
    </script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>
</html>
