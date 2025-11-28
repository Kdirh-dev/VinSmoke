@extends('front.layouts.app')

@section('title', 'Connexion - VinSmoke')
@section('description', 'Connectez-vous à votre compte VinSmoke pour gérer vos réservations et préférences.')

@section('content')

<!-- Auth Hero -->
<section class="auth-hero section-padding bg-dark text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6" data-aos="fade-up">
                <a href="{{ route('home') }}" class="auth-brand mb-4 d-inline-block">
                    <div class="brand-wrapper">
                        <div class="brand-icon">
                            <i class="fas fa-wine-glass-alt"></i>
                        </div>
                        <span class="brand-text">VinSmoke</span>
                    </div>
                </a>
                <h1 class="hero-title mb-3">Content de vous revoir</h1>
                <p class="hero-subtitle">Accédez à votre espace personnel</p>
            </div>
        </div>
    </div>
</section>

<!-- Login Form -->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="auth-card card border-0 shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-body p-5">
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    <div>
                                        @foreach($errors->all() as $error)
                                            <p class="mb-0">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="auth-form">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Adresse email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input type="email" class="form-control border-start-0"
                                           id="email" name="email" value="{{ old('email') }}"
                                           placeholder="votre@email.com" required>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <a href="#forgot-password" class="text-gold small text-decoration-none">
                                        Mot de passe oublié ?
                                    </a>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0"
                                           id="password" name="password"
                                           placeholder="Votre mot de passe" required>
                                    <button class="btn btn-outline-secondary border-start-0" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-gold btn-lg">
                                    <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                                </button>
                            </div>
                        </form>

                        <div class="auth-divider">
                            <span>ou continuer avec</span>
                        </div>

                        <div class="social-auth mb-4">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-outline-dark">
                                    <i class="fab fa-google me-2"></i>Google
                                </button>
                                <button type="button" class="btn btn-outline-dark">
                                    <i class="fab fa-facebook me-2"></i>Facebook
                                </button>
                            </div>
                        </div>

                        <div class="text-center">
                            <p class="mb-0">Pas encore de compte ?
                                <a href="{{ route('register') }}" class="text-gold text-decoration-none fw-bold">
                                    S'inscrire
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Security Notice -->
                <div class="security-notice mt-4 text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="d-flex align-items-center justify-content-center text-muted">
                        <i class="fas fa-shield-alt me-2 text-success"></i>
                        <small>Vos données sont sécurisées et confidentielles</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.auth-hero {
    background: linear-gradient(135deg,
        rgba(26, 26, 26, 0.9) 0%,
        rgba(26, 26, 26, 0.7) 100%),
        url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
    padding: 4rem 0;
}

.auth-brand {
    text-decoration: none;
}

.auth-card {
    border-radius: var(--border-radius-lg);
    overflow: hidden;
}

.auth-form .form-group {
    margin-bottom: 1.5rem;
}

.auth-form .form-label {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.auth-form .input-group-text {
    background: #f8f9fa;
    border-color: #dee2e6;
    transition: var(--transition);
}

.auth-form .form-control {
    border-color: #dee2e6;
    transition: var(--transition);
}

.auth-form .form-control:focus {
    border-color: var(--accent-gold);
    box-shadow: 0 0 0 0.2rem rgba(200, 169, 126, 0.25);
}

.auth-form .input-group:focus-within .input-group-text {
    border-color: var(--accent-gold);
    background: var(--accent-gold);
    color: white;
}

.auth-divider {
    position: relative;
    text-align: center;
    margin: 2rem 0;
    color: var(--text-muted);
}

.auth-divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #dee2e6;
}

.auth-divider span {
    background: white;
    padding: 0 1rem;
    position: relative;
}

.social-auth .btn {
    padding: 0.75rem;
    font-weight: 500;
    transition: var(--transition);
}

.social-auth .btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-soft);
}

.security-notice {
    padding: 1rem;
    background: #f8f9fa;
    border-radius: var(--border-radius);
    border: 1px solid #e9ecef;
}

.form-check-input:checked {
    background-color: var(--accent-gold);
    border-color: var(--accent-gold);
}

/* Password toggle */
#togglePassword {
    border-color: #dee2e6;
    border-left: none;
}

#togglePassword:hover {
    background: #f8f9fa;
    border-color: #dee2e6;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Password visibility toggle
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        const icon = this.querySelector('i');
        icon.className = type === 'password' ? 'fas fa-eye' : 'fas fa-eye-slash';
    });

    // Form validation
    const form = document.querySelector('.auth-form');
    form.addEventListener('submit', function(e) {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        if (!email || !password) {
            e.preventDefault();
            // Show error message
            const alert = document.createElement('div');
            alert.className = 'alert alert-warning alert-dismissible fade show';
            alert.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <div>Veuillez remplir tous les champs obligatoires</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            form.prepend(alert);
        }
    });

    // Social auth buttons
    const socialButtons = document.querySelectorAll('.social-auth .btn');
    socialButtons.forEach(button => {
        button.addEventListener('click', function() {
            // In a real app, this would trigger social authentication
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Connexion...';
            this.disabled = true;

            setTimeout(() => {
                alert('Fonctionnalité de connexion sociale à implémenter');
                this.innerHTML = this.innerHTML.replace('fa-spinner fa-spin', 'fa-exclamation-circle');
                this.disabled = false;
            }, 1500);
        });
    });
});
</script>
@endpush
