@extends('front.layouts.app')

@section('title', 'Réservation Confirmée - VinSmoke')
@section('description', 'Votre réservation chez VinSmoke a été confirmée. Merci de votre confiance.')

@section('content')

<!-- Success Hero -->
<section class="success-hero section-padding bg-dark text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="success-icon mb-4">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h1 class="hero-title mb-3">Réservation Confirmée !</h1>
                <p class="hero-subtitle">Merci d'avoir choisi VinSmoke</p>
            </div>
        </div>
    </div>
</section>

<!-- Success Content -->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="success-card card border-0 shadow-lg" data-aos="fade-up">
                    <div class="card-body p-5 text-center">

                        @if(session('success'))
                            <div class="alert alert-success border-0 mb-4">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle me-3 fa-lg"></i>
                                    <div class="text-start">
                                        <h5 class="mb-1">Succès !</h5>
                                        <p class="mb-0">{{ session('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="confirmation-badge mb-4">
                            <div class="badge-content">
                                <i class="fas fa-calendar-check"></i>
                                <span>Confirmé</span>
                            </div>
                        </div>

                        <h3 class="text-dark mb-4">Votre réservation a été enregistrée</h3>
                        <p class="text-muted mb-4">
                            Nous avons bien reçu votre demande de réservation. Notre équipe vous contactera
                            dans les plus brefs délais pour finaliser les détails.
                        </p>

                        <!-- Next Steps -->
                        <div class="next-steps mt-5">
                            <h4 class="mb-4">Prochaines étapes</h4>
                            <div class="steps-timeline">
                                <div class="step-item">
                                    <div class="step-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="step-content">
                                        <h5>Email de confirmation</h5>
                                        <p class="text-muted mb-0">
                                            Vous recevrez un email de confirmation sous 24h
                                        </p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="step-content">
                                        <h5>Appel de confirmation</h5>
                                        <p class="text-muted mb-0">
                                            Notre équipe vous appellera pour confirmer les détails
                                        </p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="step-content">
                                        <h5>Préparez votre visite</h5>
                                        <p class="text-muted mb-0">
                                            Consultez notre carte et préparez votre expérience
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons mt-5 pt-4 border-top">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <a href="{{ route('home') }}" class="btn btn-outline-dark w-100">
                                        <i class="fas fa-home me-2"></i>Accueil
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('menu') }}" class="btn btn-outline-gold w-100">
                                        <i class="fas fa-utensils me-2"></i>Voir la Carte
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('reservation.create') }}" class="btn btn-gold w-100">
                                        <i class="fas fa-plus me-2"></i>Nouvelle Réservation
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="contact-reminder mt-5 p-4 bg-light rounded-3">
                            <h5 class="mb-3">Une question ?</h5>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="contact-item">
                                        <i class="fas fa-phone text-gold me-2"></i>
                                        <span>+228 22 123 456</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="contact-item">
                                        <i class="fas fa-envelope text-gold me-2"></i>
                                        <span>contact@vinsmoke.tg</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recommendations -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Préparez votre visite</h2>
            <p class="section-subtitle">Découvrez ce qui vous attend chez VinSmoke</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="recommendation-card text-center">
                    <div class="card-image mb-3">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             alt="Notre carte" class="img-fluid rounded-3">
                    </div>
                    <h5>Explorez Notre Carte</h5>
                    <p class="text-muted">
                        Découvrez nos plats signature et nos créations du moment
                    </p>
                    <a href="{{ route('menu') }}" class="btn btn-outline-gold btn-sm">
                        Voir la carte
                    </a>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="recommendation-card text-center">
                    <div class="card-image mb-3">
                        <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             alt="Notre ambiance" class="img-fluid rounded-3">
                    </div>
                    <h5>Découvrez l'Ambiance</h5>
                    <p class="text-muted">
                        Plongez dans l'univers raffiné de VinSmoke
                    </p>
                    <a href="{{ route('gallery') }}" class="btn btn-outline-gold btn-sm">
                        Voir la galerie
                    </a>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="recommendation-card text-center">
                    <div class="card-image mb-3">
                        <img src="https://images.unsplash.com/photo-1470337458703-46ad1756a187?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             alt="Cave à vins" class="img-fluid rounded-3">
                    </div>
                    <h5>Notre Cave à Vins</h5>
                    <p class="text-muted">
                        Plus de 200 références sélectionnées avec soin
                    </p>
                    <a href="{{ route('about') }}" class="btn btn-outline-gold btn-sm">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Countdown Timer -->
<section class="section-padding bg-gold text-dark text-center">
    <div class="container">
        <h3 class="mb-3">Compte à rebours jusqu'à votre visite</h3>
        <div class="countdown-container" data-aos="zoom-in">
            <div class="countdown-timer">
                <div class="time-unit">
                    <span class="number" id="days">00</span>
                    <span class="label">Jours</span>
                </div>
                <div class="time-unit">
                    <span class="number" id="hours">00</span>
                    <span class="label">Heures</span>
                </div>
                <div class="time-unit">
                    <span class="number" id="minutes">00</span>
                    <span class="label">Minutes</span>
                </div>
                <div class="time-unit">
                    <span class="number" id="seconds">00</span>
                    <span class="label">Secondes</span>
                </div>
            </div>
        </div>
        <p class="mt-3 opacity-75">
            Nous avons hâte de vous accueillir chez VinSmoke !
        </p>
    </div>
</section>

@endsection

@push('styles')
<style>
.success-hero {
    background: linear-gradient(135deg,
        rgba(26, 26, 26, 0.9) 0%,
        rgba(26, 26, 26, 0.7) 100%),
        url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
}

.success-icon {
    font-size: 4rem;
    color: var(--accent-gold);
    animation: bounceIn 1s ease-out;
}

.success-card {
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    border: 2px solid var(--accent-gold);
}

.confirmation-badge {
    display: inline-block;
}

.badge-content {
    background: var(--accent-gold);
    color: var(--primary-dark);
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.steps-timeline {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    max-width: 400px;
    margin: 0 auto;
}

.step-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    text-align: left;
}

.step-icon {
    width: 50px;
    height: 50px;
    background: var(--accent-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-dark);
    flex-shrink: 0;
}

.step-content h5 {
    margin-bottom: 0.5rem;
    color: var(--primary-dark);
}

.contact-item {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.5rem;
    background: white;
    border-radius: var(--border-radius);
    font-weight: 500;
}

.recommendation-card {
    background: white;
    padding: 2rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-soft);
    transition: var(--transition);
    height: 100%;
}

.recommendation-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
}

.card-image {
    height: 150px;
    overflow: hidden;
    border-radius: var(--border-radius);
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.recommendation-card:hover .card-image img {
    transform: scale(1.1);
}

.countdown-timer {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.time-unit {
    text-align: center;
    background: rgba(255, 255, 255, 0.9);
    padding: 1rem;
    border-radius: var(--border-radius);
    min-width: 80px;
    box-shadow: var(--shadow-soft);
}

.time-unit .number {
    display: block;
    font-size: 2rem;
    font-weight: 900;
    color: var(--primary-dark);
    line-height: 1;
}

.time-unit .label {
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--text-gray);
    text-transform: uppercase;
    letter-spacing: 1px;
}

@keyframes bounceIn {
    0% {
        opacity: 0;
        transform: scale(0.3);
    }
    50% {
        opacity: 1;
        transform: scale(1.05);
    }
    70% {
        transform: scale(0.9);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

@media (max-width: 768px) {
    .steps-timeline {
        max-width: 100%;
    }

    .countdown-timer {
        gap: 1rem;
    }

    .time-unit {
        min-width: 70px;
        padding: 0.75rem;
    }

    .time-unit .number {
        font-size: 1.5rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set countdown to 3 days from now (example)
    const countdownDate = new Date();
    countdownDate.setDate(countdownDate.getDate() + 3);
    countdownDate.setHours(19, 0, 0, 0); // Set to 7 PM

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = countdownDate - now;

        if (distance < 0) {
            document.getElementById('days').textContent = '00';
            document.getElementById('hours').textContent = '00';
            document.getElementById('minutes').textContent = '00';
            document.getElementById('seconds').textContent = '00';
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('days').textContent = days.toString().padStart(2, '0');
        document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
        document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
        document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
    }

    // Update countdown every second
    updateCountdown();
    setInterval(updateCountdown, 1000);

    // Add some celebratory effects
    const successIcon = document.querySelector('.success-icon');
    setTimeout(() => {
        successIcon.style.transform = 'scale(1.1)';
        successIcon.style.transition = 'transform 0.3s ease';
    }, 1000);

    setTimeout(() => {
        successIcon.style.transform = 'scale(1)';
    }, 1300);

    // Confetti effect (simplified)
    function createConfetti() {
        const confettiCount = 20;
        const container = document.querySelector('.success-card');

        for (let i = 0; i < confettiCount; i++) {
            const confetti = document.createElement('div');
            confetti.className = 'confetti';
            confetti.style.cssText = `
                position: absolute;
                width: 10px;
                height: 10px;
                background: var(--accent-gold);
                border-radius: 2px;
                top: -10px;
                left: ${Math.random() * 100}%;
                animation: fall linear forwards;
                animation-duration: ${Math.random() * 3 + 2}s;
            `;

            container.style.position = 'relative';
            container.appendChild(confetti);

            setTimeout(() => {
                confetti.remove();
            }, 5000);
        }
    }

    // Add confetti style
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fall {
            to {
                transform: translateY(100vh) rotate(${Math.random() * 360}deg);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);

    // Trigger confetti after a delay
    setTimeout(createConfetti, 500);
});
</script>
@endpush
