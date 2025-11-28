@extends('front.layouts.app')

@section('title', 'Réservation - VinSmoke Restaurant Lomé')
@section('description', 'Réservez votre table chez VinSmoke restaurant à Lomé. Expérience gastronomique exceptionnelle dans un cadre raffiné.')

@section('content')

<!-- Reservation Hero -->
<section class="reservation-hero section-padding bg-dark text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up">
                <h1 class="hero-title mb-4">Réserver une Table</h1>
                <p class="hero-subtitle">Préparez-vous à vivre un moment exceptionnel</p>
            </div>
        </div>
    </div>
</section>

<!-- Reservation Process -->
<section class="section-padding">
    <div class="container">
        <!-- Process Steps -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="process-steps">
                    <div class="step active">
                        <div class="step-number">1</div>
                        <div class="step-label">Informations</div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-label">Confirmation</div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-label">Terminé</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="reservation-card card border-0 shadow-lg" data-aos="fade-up">
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

                        <form action="{{ route('reservation.store') }}" method="POST" id="reservationForm">
                            @csrf

                            <!-- Personal Information -->
                            <div class="form-section">
                                <h4 class="section-title mb-4">
                                    <i class="fas fa-user me-2 text-gold"></i>
                                    Informations Personnelles
                                </h4>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="customer_name" class="form-label">Nom complet *</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class="fas fa-user text-muted"></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0"
                                                       id="customer_name" name="customer_name"
                                                       value="{{ old('customer_name') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email *</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class="fas fa-envelope text-muted"></i>
                                                </span>
                                                <input type="email" class="form-control border-start-0"
                                                       id="email" name="email"
                                                       value="{{ old('email') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Téléphone *</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class="fas fa-phone text-muted"></i>
                                                </span>
                                                <input type="tel" class="form-control border-start-0"
                                                       id="phone" name="phone"
                                                       value="{{ old('phone') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="guests_count" class="form-label">Nombre de personnes *</label>
                                            <select class="form-select" id="guests_count" name="guests_count" required>
                                                <option value="">Sélectionnez...</option>
                                                @for($i = 1; $i <= 20; $i++)
                                                    <option value="{{ $i }}" {{ old('guests_count') == $i ? 'selected' : '' }}>
                                                        {{ $i }} personne{{ $i > 1 ? 's' : '' }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reservation Details -->
                            <div class="form-section mt-5">
                                <h4 class="section-title mb-4">
                                    <i class="fas fa-calendar-alt me-2 text-gold"></i>
                                    Détails de la Réservation
                                </h4>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="reservation_date" class="form-label">Date *</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class="fas fa-calendar text-muted"></i>
                                                </span>
                                                <input type="date" class="form-control border-start-0"
                                                       id="reservation_date" name="reservation_date"
                                                       min="{{ date('Y-m-d') }}"
                                                       value="{{ old('reservation_date') }}" required>
                                            </div>
                                            <div class="form-text">Réservation possible jusqu'à 3 mois à l'avance</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="reservation_time" class="form-label">Heure *</label>
                                            <select class="form-select" id="reservation_time" name="reservation_time" required>
                                                <option value="">Sélectionnez...</option>
                                                <optgroup label="Déjeuner">
                                                    <option value="12:00" {{ old('reservation_time') == '12:00' ? 'selected' : '' }}>12:00</option>
                                                    <option value="12:30" {{ old('reservation_time') == '12:30' ? 'selected' : '' }}>12:30</option>
                                                    <option value="13:00" {{ old('reservation_time') == '13:00' ? 'selected' : '' }}>13:00</option>
                                                    <option value="13:30" {{ old('reservation_time') == '13:30' ? 'selected' : '' }}>13:30</option>
                                                </optgroup>
                                                <optgroup label="Dîner">
                                                    <option value="19:00" {{ old('reservation_time') == '19:00' ? 'selected' : '' }}>19:00</option>
                                                    <option value="19:30" {{ old('reservation_time') == '19:30' ? 'selected' : '' }}>19:30</option>
                                                    <option value="20:00" {{ old('reservation_time') == '20:00' ? 'selected' : '' }}>20:00</option>
                                                    <option value="20:30" {{ old('reservation_time') == '20:30' ? 'selected' : '' }}>20:30</option>
                                                    <option value="21:00" {{ old('reservation_time') == '21:00' ? 'selected' : '' }}>21:00</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Special Requests -->
                            <div class="form-section mt-5">
                                <h4 class="section-title mb-4">
                                    <i class="fas fa-star me-2 text-gold"></i>
                                    Demandes Spéciales
                                </h4>

                                <div class="form-group">
                                    <label for="special_requests" class="form-label">Commentaires ou demandes particulières</label>
                                    <textarea class="form-control" id="special_requests" name="special_requests"
                                              rows="4" placeholder="Allergies, anniversaire, occasion spéciale, préférences...">{{ old('special_requests') }}</textarea>
                                    <div class="form-text">
                                        Nous ferons de notre mieux pour répondre à vos demandes
                                    </div>
                                </div>

                                <!-- Occasion Type -->
                                <div class="form-group mt-3">
                                    <label class="form-label">Type d'occasion</label>
                                    <div class="occasion-buttons">
                                        <input type="radio" class="btn-check" name="occasion" id="occasion1" value="dinner" checked>
                                        <label class="btn btn-outline-dark" for="occasion1">
                                            <i class="fas fa-utensils me-2"></i>Dîner
                                        </label>

                                        <input type="radio" class="btn-check" name="occasion" id="occasion2" value="anniversary">
                                        <label class="btn btn-outline-dark" for="occasion2">
                                            <i class="fas fa-heart me-2"></i>Anniversaire
                                        </label>

                                        <input type="radio" class="btn-check" name="occasion" id="occasion3" value="business">
                                        <label class="btn btn-outline-dark" for="occasion3">
                                            <i class="fas fa-briefcase me-2"></i>Affaires
                                        </label>

                                        <input type="radio" class="btn-check" name="occasion" id="occasion4" value="celebration">
                                        <label class="btn btn-outline-dark" for="occasion4">
                                            <i class="fas fa-glass-cheers me-2"></i>Célébration
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Summary -->
                            <div class="form-section mt-5">
                                <div class="reservation-summary bg-light rounded-3 p-4">
                                    <h5 class="mb-3">Récapitulatif</h5>
                                    <div class="summary-items">
                                        <div class="summary-item">
                                            <span class="label">Date:</span>
                                            <span class="value" id="summaryDate">--</span>
                                        </div>
                                        <div class="summary-item">
                                            <span class="label">Heure:</span>
                                            <span class="value" id="summaryTime">--</span>
                                        </div>
                                        <div class="summary-item">
                                            <span class="label">Personnes:</span>
                                            <span class="value" id="summaryGuests">--</span>
                                        </div>
                                        <div class="summary-item">
                                            <span class="label">Occasion:</span>
                                            <span class="value" id="summaryOccasion">Dîner</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="form-section mt-5">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-gold btn-lg py-3">
                                        <i class="fas fa-calendar-check me-2"></i>
                                        Confirmer la Réservation
                                    </button>
                                </div>
                                <div class="text-center mt-3">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Vous recevrez un email de confirmation sous 24h
                                    </small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Reserve Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label text-gold">Pourquoi réserver ?</span>
            <h2 class="section-title">L'Expérience VinSmoke</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-crown"></i>
                    </div>
                    <h5>Service Personnalisé</h5>
                    <p class="text-muted">
                        Notre équipe s'adapte à vos préférences pour une expérience sur mesure
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-wine-glass-alt"></i>
                    </div>
                    <h5>Accords Mets-Vins</h5>
                    <p class="text-muted">
                        Nos sommeliers vous conseillent pour des accords parfaits
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-spa"></i>
                    </div>
                    <h5>Ambiance Exclusive</h5>
                    <p class="text-muted">
                        Cadre raffiné et intimiste pour des moments privilégiés
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.reservation-hero {
    background: linear-gradient(135deg,
        rgba(26, 26, 26, 0.9) 0%,
        rgba(26, 26, 26, 0.7) 100%),
        url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
}

.process-steps {
    display: flex;
    justify-content: center;
    gap: 3rem;
    position: relative;
}

.process-steps::before {
    content: '';
    position: absolute;
    top: 25px;
    left: 25%;
    right: 25%;
    height: 2px;
    background: var(--border-light);
    z-index: 1;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    z-index: 2;
}

.step-number {
    width: 50px;
    height: 50px;
    background: var(--border-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: var(--text-gray);
    margin-bottom: 0.5rem;
    transition: var(--transition);
}

.step.active .step-number {
    background: var(--accent-gold);
    color: var(--primary-dark);
    transform: scale(1.1);
}

.step-label {
    font-weight: 600;
    color: var(--text-gray);
    transition: var(--transition);
}

.step.active .step-label {
    color: var(--accent-gold);
}

.reservation-card {
    border-radius: var(--border-radius-lg);
    overflow: hidden;
}

.form-section {
    padding-bottom: 2rem;
    border-bottom: 1px solid var(--border-light);
}

.form-section:last-child {
    border-bottom: none;
}

.section-title {
    font-size: 1.25rem;
    color: var(--primary-dark);
    display: flex;
    align-items: center;
}

.form-group {
    margin-bottom: 1.5rem;
}

.input-group-text {
    border-right: none;
    transition: var(--transition);
}

.form-control:focus,
.form-select:focus {
    border-color: var(--accent-gold);
    box-shadow: 0 0 0 0.2rem rgba(200, 169, 126, 0.25);
}

.input-group:focus-within .input-group-text {
    border-color: var(--accent-gold);
    background: var(--accent-gold);
    color: white;
}

.occasion-buttons {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.occasion-buttons .btn {
    border-radius: 25px;
    padding: 0.5rem 1rem;
    transition: var(--transition);
}

.occasion-buttons .btn-check:checked + .btn {
    background: var(--accent-gold);
    border-color: var(--accent-gold);
    color: var(--primary-dark);
    transform: translateY(-2px);
}

.reservation-summary {
    border-left: 4px solid var(--accent-gold);
}

.summary-items {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.summary-item:last-child {
    border-bottom: none;
}

.summary-item .label {
    font-weight: 600;
    color: var(--text-dark);
}

.summary-item .value {
    color: var(--accent-gold);
    font-weight: 600;
}

.feature-card {
    padding: 2rem 1rem;
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-soft);
    transition: var(--transition);
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
}

.feature-icon {
    width: 70px;
    height: 70px;
    background: var(--accent-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: var(--primary-dark);
    font-size: 1.75rem;
}

.feature-card h5 {
    margin-bottom: 1rem;
    color: var(--primary-dark);
}

@media (max-width: 768px) {
    .process-steps {
        gap: 1.5rem;
    }

    .process-steps::before {
        left: 15%;
        right: 15%;
    }

    .step-number {
        width: 40px;
        height: 40px;
        font-size: 0.9rem;
    }

    .occasion-buttons {
        justify-content: center;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('reservationForm');
    const dateInput = document.getElementById('reservation_date');
    const timeSelect = document.getElementById('reservation_time');
    const guestsSelect = document.getElementById('guests_count');
    const occasionButtons = document.querySelectorAll('input[name="occasion"]');

    // Summary elements
    const summaryDate = document.getElementById('summaryDate');
    const summaryTime = document.getElementById('summaryTime');
    const summaryGuests = document.getElementById('summaryGuests');
    const summaryOccasion = document.getElementById('summaryOccasion');

    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    dateInput.min = today;

    // Set maximum date to 3 months from now
    const maxDate = new Date();
    maxDate.setMonth(maxDate.getMonth() + 3);
    dateInput.max = maxDate.toISOString().split('T')[0];

    // Update summary in real-time
    function updateSummary() {
        // Date
        const dateValue = dateInput.value;
        if (dateValue) {
            const date = new Date(dateValue);
            summaryDate.textContent = date.toLocaleDateString('fr-FR', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        } else {
            summaryDate.textContent = '--';
        }

        // Time
        summaryTime.textContent = timeSelect.value || '--';

        // Guests
        summaryGuests.textContent = guestsSelect.value ?
            guestsSelect.value + ' personne' + (guestsSelect.value > 1 ? 's' : '') : '--';

        // Occasion
        const selectedOccasion = document.querySelector('input[name="occasion"]:checked');
        if (selectedOccasion) {
            const occasionLabels = {
                'dinner': 'Dîner',
                'anniversary': 'Anniversaire',
                'business': 'Affaires',
                'celebration': 'Célébration'
            };
            summaryOccasion.textContent = occasionLabels[selectedOccasion.value];
        }
    }

    // Event listeners for real-time updates
    dateInput.addEventListener('change', updateSummary);
    timeSelect.addEventListener('change', updateSummary);
    guestsSelect.addEventListener('change', updateSummary);
    occasionButtons.forEach(btn => {
        btn.addEventListener('change', updateSummary);
    });

    // Form validation
    form.addEventListener('submit', function(e) {
        const date = new Date(dateInput.value);
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if (date < today) {
            e.preventDefault();
            alert('Veuillez sélectionner une date future');
            dateInput.focus();
            return;
        }

        if (parseInt(guestsSelect.value) > 20) {
            e.preventDefault();
            alert('Pour les groupes de plus de 20 personnes, veuillez nous contacter directement');
            guestsSelect.focus();
            return;
        }

        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Traitement...';
        submitBtn.disabled = true;
    });

    // Phone number formatting
    const phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 0) {
            value = value.match(/.{1,2}/g).join(' ');
        }
        e.target.value = value;
    });

    // Initialize summary
    updateSummary();

    // Add some visual feedback for form interactions
    const formControls = form.querySelectorAll('input, select, textarea');
    formControls.forEach(control => {
        control.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        control.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
});
</script>
@endpush
