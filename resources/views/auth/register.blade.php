@extends('front.layouts.app')

@section('title', 'Inscription - VinSmoke')
@section('description', 'Créez votre compte VinSmoke pour gérer vos réservations, recevoir des offres exclusives et personnaliser votre expérience.')

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
                <h1 class="hero-title mb-3">Rejoignez-nous</h1>
                <p class="hero-subtitle">Créez votre compte et vivez l'expérience VinSmoke</p>
            </div>
        </div>
    </div>
</section>

<!-- Registration Form -->
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

                        <form method="POST" action="{{ route('register') }}" class="auth-form" id="registerForm">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="name" class="form-label">Nom complet *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-user text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control border-start-0"
                                           id="name" name="name" value="{{ old('name') }}"
                                           placeholder="Votre nom complet" required>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Adresse email *</label>
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
                                <label for="password" class="form-label">Mot de passe *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0"
                                           id="password" name="password"
                                           placeholder="Créez un mot de passe" required>
                                    <button class="btn btn-outline-secondary border-start-0" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="password-strength mt-2">
                                    <div class="strength-bar">
                                        <div class="strength-fill" id="strengthFill"></div>
                                    </div>
                                    <small class="text-muted" id="strengthText">Force du mot de passe</small>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="password_confirmation" class="form-label">Confirmer le mot de passe *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0"
                                           id="password_confirmation" name="password_confirmation"
                                           placeholder="Confirmez votre mot de passe" required>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                    <label class="form-check-label" for="terms">
                                        J'accepte les
                                        <a href="#" class="text-gold text-decoration-none">conditions d'utilisation</a>
                                        et la
                                        <a href="#" class="text-gold text-decoration-none">politique de confidentialité</a>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter" checked>
                                    <label class="form-check-label" for="newsletter">
                                        Recevoir les actualités et offres exclusives de VinSmoke
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-gold btn-lg">
                                    <i class="fas fa-user-plus me-2"></i>Créer mon compte
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
                            <p class="mb-0">Déjà un compte ?
                                <a href="{{ route('login') }}" class="text-gold text-decoration-none fw-bold">
                                    Se connecter
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Benefits -->
                <div class="benefits-card mt-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="card border-0 bg-light">
                        <div class="card-body p-4">
                            <h6 class="mb-3 text-dark">
                                <i class="fas fa-crown me-2 text-gold"></i>
                                Avantages du compte
                            </h6>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    <small>Réservations rapides</small>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    <small>Historique des réservations</small>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    <small>Offres exclusives</small>
                                </li>
                                <li>
                                    <i class="fas fa-check text-success me-2"></i>
                                    <small>Préférences sauvegardées</small>
                                </li>
                            </ul>
                        </div>
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

.auth-card {
    border-radius: var(--border-radius-lg);
    overflow: hidden;
}

.password-strength {
    margin-top: 0.5rem;
}

.strength-bar {
    width: 100%;
    height: 4px;
    background: #e9ecef;
    border-radius: 2px;
    overflow: hidden;
}

.strength-fill {
    height: 100%;
    width: 0%;
    border-radius: 2px;
    transition: all 0.3s ease;
}

.strength-fill.weak {
    background: #dc3545;
    width: 33%;
}

.strength-fill.medium {
    background: #ffc107;
    width: 66%;
}

.strength-fill.strong {
    background: #28a745;
    width: 100%;
}

.benefits-card .card {
    border-radius: var(--border-radius);
}

.benefits-card ul li {
    display: flex;
    align-items: center;
}

/* Rest of the styles from login page apply here too */
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('password_confirmation');
    const strengthFill = document.getElementById('strengthFill');
    const strengthText = document.getElementById('strengthText');
    const togglePassword = document.getElementById('togglePassword');

    // Password strength indicator
    passwordInput.addEventListener('input', function() {
        const password = this.value;
        let strength = 0;
        let text = 'Faible';
        let className = 'weak';

        if (password.length >= 8) strength++;
        if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
        if (password.match(/\d/)) strength++;
        if (password.match(/[^a-zA-Z\d]/)) strength++;

        if (strength >= 4) {
            text = 'Fort';
            className = 'strong';
        } else if (strength >= 2) {
            text = 'Moyen';
            className = 'medium';
        }

        strengthFill.className = 'strength-fill ' + className;
        strengthText.textContent = 'Force du mot de passe: ' + text;
        strengthText.className = strength === 0 ? 'text-muted' :
                               className === 'weak' ? 'text-danger' :
                               className === 'medium' ? 'text-warning' : 'text-success';
    });

    // Password confirmation check
    confirmInput.addEventListener('input', function() {
        if (this.value !== passwordInput.value) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });

    // Toggle password visibility
    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        confirmInput.setAttribute('type', type);

        const icon = this.querySelector('i');
        icon.className = type === 'password' ? 'fas fa-eye' : 'fas fa-eye-slash';
    });

    // Form validation
    registerForm.addEventListener('submit', function(e) {
        const password = passwordInput.value;
        const confirm = confirmInput.value;
        const terms = document.getElementById('terms').checked;

        if (password !== confirm) {
            e.preventDefault();
            alert('Les mots de passe ne correspondent pas');
            confirmInput.focus();
            return;
        }

        if (password.length < 8) {
            e.preventDefault();
            alert('Le mot de passe doit contenir au moins 8 caractères');
            passwordInput.focus();
            return;
        }

        if (!terms) {
            e.preventDefault();
            alert('Veuillez accepter les conditions d\'utilisation');
            return;
        }

        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Création du compte...';
        submitBtn.disabled = true;
    });

    // Social auth buttons
    const socialButtons = document.querySelectorAll('.social-auth .btn');
    socialButtons.forEach(button => {
        button.addEventListener('click', function() {
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
