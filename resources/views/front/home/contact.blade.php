@extends('front.layouts.app')

@section('title', 'Contact - VinSmoke Restaurant Lomé')
@section('description', 'Contactez VinSmoke restaurant à Lomé. Réservations, informations, événements privés. Notre équipe vous répond sous 24h.')

@section('content')

<!-- Contact Hero -->
<section class="contact-hero section-padding bg-dark text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up">
                <h1 class="hero-title mb-4">Prendre Contact</h1>
                <p class="hero-subtitle">Nous sommes à votre écoute pour toute demande</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Content -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Contact Info -->
            <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="contact-info">
                    <h3 class="mb-4">Nos Coordonnées</h3>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h5>Adresse</h5>
                            <p>Rue des Gourmets, Plateau<br>Lomé, Togo</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <h5>Téléphone</h5>
                            <p>+228 22 123 456</p>
                            <small class="text-muted">Lun-Dim: 9h-22h</small>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h5>Email</h5>
                            <p>contact@vinsmoke.tg</p>
                            <small class="text-muted">Réponse sous 24h</small>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h5>Horaires</h5>
                            <p>Lun - Ven: 11h30 - 22h00<br>Sam - Dim: 12h00 - 23h00</p>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="social-contact mt-5">
                        <h5 class="mb-3">Suivez-nous</h5>
                        <div class="social-links">
                            <a href="#" class="social-link">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-tripadvisor"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-8" data-aos="fade-left">
                <div class="contact-form-card card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <h3 class="mb-4">Envoyez-nous un message</h3>
                        <p class="text-muted mb-4">Nous vous répondrons dans les plus brefs délais</p>

                        <form id="contactForm" class="contact-form">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nom complet *</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="subject" class="form-label">Sujet *</label>
                                <select class="form-select" id="subject" name="subject" required>
                                    <option value="">Sélectionnez un sujet</option>
                                    <option value="reservation">Réservation</option>
                                    <option value="information">Demande d'information</option>
                                    <option value="event">Événement privé</option>
                                    <option value="partnership">Partenariat</option>
                                    <option value="other">Autre</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control" id="message" name="message" rows="6"
                                          placeholder="Décrivez votre demande en détail..." required></textarea>
                            </div>

                            <div class="form-group mt-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="newsletter">
                                    <label class="form-check-label" for="newsletter">
                                        Recevoir les actualités et offres spéciales de VinSmoke
                                    </label>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-gold btn-lg w-100">
                                    <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="map-container">
                    <div class="map-placeholder">
                        <div class="placeholder-content">
                            <i class="fas fa-map-marked-alt fa-3x text-gold mb-3"></i>
                            <h4 class="text-dark mb-2">Notre Emplacement</h4>
                            <p class="text-muted mb-3">Rue des Gourmets, Plateau - Lomé, Togo</p>
                            <a href="https://maps.google.com/?q=Lomé,Togo" target="_blank" class="btn btn-gold">
                                <i class="fas fa-directions me-2"></i>Voir sur Google Maps
                            </a>
                        </div>
                    </div>
                    <!-- Intégration Google Maps serait ici -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label text-gold">Questions Fréquentes</span>
            <h2 class="section-title">Informations Pratiques</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                <i class="fas fa-utensils me-3 text-gold"></i>
                                Dois-je réserver à l'avance ?
                            </button>
                        </h3>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Nous recommandons fortement de réserver, surtout pour les weekends et les soirées.
                                Vous pouvez réserver en ligne jusqu'à 3 mois à l'avance.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                <i class="fas fa-tshirt me-3 text-gold"></i>
                                Y a-t-il un code vestimentaire ?
                            </button>
                        </h3>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Tenue chic décontractée recommandée. Nous apprécions une tenue soignée
                                pour préserver l'ambiance élégante de notre établissement.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                <i class="fas fa-wheelchair me-3 text-gold"></i>
                                L'établissement est-il accessible aux PMR ?
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Oui, notre restaurant est entièrement accessible aux personnes à mobilité réduite.
                                N'hésitez pas à nous contacter pour toute assistance particulière.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                <i class="fas fa-paw me-3 text-gold"></i>
                                Les animaux sont-ils acceptés ?
                            </button>
                        </h3>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Seuls les chiens guides sont autorisés dans l'établissement.
                                Nous ne pouvons pas accepter les autres animaux pour des raisons d'hygiène.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-gold">
    <div class="container text-center">
        <h2 class="text-dark mb-3">Une question urgente ?</h2>
        <p class="text-dark mb-4 opacity-75">
            Appelez-nous directement pour une réponse immédiate
        </p>
        <div class="d-flex gap-3 justify-content-center flex-wrap align-items-center">
            <a href="tel:+22822123456" class="btn btn-dark btn-lg">
                <i class="fas fa-phone me-2"></i>+228 22 123 456
            </a>
            <span class="text-dark">ou</span>
            <a href="{{ route('reservation.create') }}" class="btn btn-outline-dark btn-lg">
                <i class="fas fa-calendar-check me-2"></i>Réserver en ligne
            </a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.contact-hero {
    background: linear-gradient(135deg,
        rgba(26, 26, 26, 0.9) 0%,
        rgba(26, 26, 26, 0.7) 100%),
        url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
}

.contact-info {
    position: sticky;
    top: 100px;
}

.info-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid var(--border-light);
}

.info-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.info-icon {
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

.info-content h5 {
    margin-bottom: 0.5rem;
    color: var(--primary-dark);
}

.info-content p {
    margin-bottom: 0.25rem;
    color: var(--text-dark);
}

.contact-form-card {
    border-radius: var(--border-radius-lg);
    overflow: hidden;
}

.contact-form .form-group {
    margin-bottom: 1.5rem;
}

.contact-form .form-label {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.contact-form .form-control,
.contact-form .form-select {
    border: 2px solid #e9ecef;
    border-radius: var(--border-radius);
    padding: 0.75rem 1rem;
    transition: var(--transition);
}

.contact-form .form-control:focus,
.contact-form .form-select:focus {
    border-color: var(--accent-gold);
    box-shadow: 0 0 0 0.2rem rgba(200, 169, 126, 0.25);
}

.social-contact {
    padding-top: 2rem;
    border-top: 1px solid var(--border-light);
}

.social-links {
    display: flex;
    gap: 1rem;
}

.social-link {
    width: 45px;
    height: 45px;
    background: var(--primary-dark);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: var(--transition);
}

.social-link:hover {
    background: var(--accent-gold);
    color: var(--primary-dark);
    transform: translateY(-2px);
}

.map-section {
    background: #f8f9fa;
}

.map-container {
    position: relative;
    height: 400px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.map-placeholder {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.95);
}

.placeholder-content {
    text-align: center;
}

.accordion-item {
    border: none;
    border-radius: var(--border-radius) !important;
    margin-bottom: 1rem;
    box-shadow: var(--shadow-soft);
    overflow: hidden;
}

.accordion-button {
    background: white;
    border: none;
    padding: 1.5rem;
    font-weight: 600;
    color: var(--primary-dark);
}

.accordion-button:not(.collapsed) {
    background: var(--accent-gold);
    color: var(--primary-dark);
    box-shadow: none;
}

.accordion-button:focus {
    box-shadow: none;
    border-color: var(--accent-gold);
}

.accordion-body {
    padding: 1.5rem;
    background: #f8f9fa;
    border-top: 1px solid #e9ecef;
}

@media (max-width: 768px) {
    .contact-info {
        position: static;
        margin-bottom: 3rem;
    }

    .info-item {
        flex-direction: column;
        text-align: center;
    }

    .info-icon {
        margin: 0 auto;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');

    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Simulation d'envoi
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;

        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Envoi en cours...';
        submitBtn.disabled = true;

        setTimeout(() => {
            // Ici, on enverrait les données au serveur
            const alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show mt-4';
            alert.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle me-2"></i>
                    <div>
                        <strong>Message envoyé !</strong><br>
                        Nous vous répondrons dans les plus brefs délais.
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;

            contactForm.prepend(alert);
            contactForm.reset();
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;

            // Scroll to top of form
            contactForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 2000);
    });

    // Animation for accordion
    const accordionItems = document.querySelectorAll('.accordion-item');
    accordionItems.forEach(item => {
        item.addEventListener('show.bs.collapse', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = 'var(--shadow-medium)';
        });

        item.addEventListener('hide.bs.collapse', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'var(--shadow-soft)';
        });
    });
});
</script>
@endpush
