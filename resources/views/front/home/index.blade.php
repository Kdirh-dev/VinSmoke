@extends('front.layouts.app')

@section('title', 'Restaurant Gastronomique à Lomé')
@section('description', 'VinSmoke - Une expérience culinaire exceptionnelle au cœur de Lomé. Cuisine raffinée, cave à vins sélectionnée et service d\'exception.')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
            <div class="hero-badge mb-4">
                <span class="badge bg-gold text-dark px-4 py-2 rounded-pill">
                    <i class="fas fa-star me-2"></i>Depuis 2010
                </span>
            </div>
            <h1 class="hero-title">VinSmoke</h1>
            <p class="hero-subtitle">Une expérience gastronomique inoubliable</p>
            <div class="hero-buttons" data-aos="fade-up" data-aos-delay="400">
                <a href="{{ route('menu') }}" class="btn btn-reservation me-3">
                    <i class="fas fa-utensils me-2"></i>Découvrir la Carte
                </a>
                <a href="{{ route('reservation.create') }}" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-calendar-check me-2"></i>Réserver une Table
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator" data-aos="fade-up" data-aos-delay="600">
        <div class="scroll-line"></div>
        <span>Explorer</span>
    </div>
</section>

<!-- About Preview -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-image position-relative">
                    <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                         alt="Notre restaurant" class="img-fluid rounded-3 shadow">
                    <div class="experience-badge">
                        <div class="experience-content">
                            <span class="years">10+</span>
                            <span class="text">Ans d'expérience</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <span class="section-label text-gold">Notre Histoire</span>
                <h2 class="section-title text-start mb-4">L'Art de la Gastronomie</h2>
                <p class="lead text-dark mb-4">
                    Depuis une décennie, VinSmoke incarne l'excellence culinaire à Lomé.
                    Notre philosophie : marier tradition et innovation pour créer des moments inoubliables.
                </p>
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Produits Frais</h5>
                            <p class="mb-0">Ingrédients sélectionnés avec soin</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-wine-bottle"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Cave d'Exception</h5>
                            <p class="mb-0">Plus de 200 références</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Service Premium</h5>
                            <p class="mb-0">Attention personnalisée</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('about') }}" class="btn btn-gold mt-4">
                    Découvrir Notre Histoire <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Dishes -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label text-gold">Spécialités</span>
            <h2 class="section-title">Nos Créations Signature</h2>
            <p class="section-subtitle">Des plats raffinés préparés avec passion par nos chefs</p>
        </div>

        <div class="row g-4">
            @foreach($featuredDishes as $dish)
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="dish-card card h-100 border-0">
                    <div class="card-img-wrapper position-relative overflow-hidden">
                        <img src="{{ $dish->image ? asset('storage/' . $dish->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
                             class="card-img-top" alt="{{ $dish->name }}">
                        <div class="card-overlay">
                            <div class="overlay-content">
                                <a href="{{ route('menu.show', $dish->slug) }}" class="btn btn-gold btn-sm">
                                    Voir détails
                                </a>
                            </div>
                        </div>
                        @if($dish->is_featured)
                        <div class="dish-badge">
                            <span class="badge bg-gold text-dark">
                                <i class="fas fa-star me-1"></i>Signature
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title mb-0">{{ $dish->name }}</h5>
                            <span class="text-gold fw-bold">{{ $dish->formatted_price }}</span>
                        </div>
                        <p class="card-text text-muted">{{ Str::limit($dish->description, 120) }}</p>
                        <div class="card-meta">
                            <span class="category-badge">{{ $dish->category->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('menu') }}" class="btn btn-outline-dark btn-lg">
                Explorer Toute la Carte <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Gallery Preview -->
<section class="section-padding bg-dark text-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label text-gold">Ambiance</span>
            <h2 class="section-title text-white">Notre Univers</h2>
            <p class="section-subtitle text-light">Découvrez l'atmosphère unique de VinSmoke</p>
        </div>

        <div class="row g-3">
            @foreach($galleryImages as $image)
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="gallery-item position-relative overflow-hidden rounded-3">
                    <img src="{{ asset('storage/' . $image->image) }}"
                         class="img-fluid w-100"
                         alt="{{ $image->title }}"
                         style="height: 280px; object-fit: cover;">
                    <div class="gallery-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-end">
                        <div class="overlay-content p-4 w-100">
                            <h6 class="text-white mb-1">{{ $image->title }}</h6>
                            @if($image->description)
                                <p class="text-light small mb-0">{{ Str::limit($image->description, 60) }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('gallery') }}" class="btn btn-gold btn-lg">
                <i class="fas fa-images me-2"></i>Voir la Galerie Complète
            </a>
        </div>
    </div>
</section>

<!-- Reservation CTA -->
<section class="section-padding bg-gold">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <h2 class="text-dark mb-3">Prêt pour une expérience unique ?</h2>
                <p class="text-dark mb-4 opacity-75">
                    Réservez votre table et laissez-nous vous faire vivre un moment gastronomique exceptionnel.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                <a href="{{ route('reservation.create') }}" class="btn btn-dark btn-lg">
                    <i class="fas fa-calendar-check me-2"></i>Réserver Maintenant
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.section-label {
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    display: block;
    margin-bottom: 1rem;
}

.about-image {
    position: relative;
}

.experience-badge {
    position: absolute;
    bottom: -20px;
    right: -20px;
    background: var(--accent-gold);
    border-radius: var(--border-radius-lg);
    padding: 1.5rem;
    box-shadow: var(--shadow-medium);
}

.experience-content {
    text-align: center;
    color: var(--primary-dark);
}

.years {
    display: block;
    font-size: 2rem;
    font-weight: 900;
    line-height: 1;
}

.features-grid {
    display: grid;
    gap: 1.5rem;
    margin: 2rem 0;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.feature-icon {
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

.feature-content h5 {
    margin-bottom: 0.25rem;
    color: var(--primary-dark);
}

.card-img-wrapper {
    position: relative;
    overflow: hidden;
}

.card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(26, 26, 26, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition);
}

.dish-card:hover .card-overlay {
    opacity: 1;
}

.overlay-content {
    transform: translateY(20px);
    transition: var(--transition);
}

.dish-card:hover .overlay-content {
    transform: translateY(0);
}

.category-badge {
    background: var(--primary-light);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
}

.scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    color: var(--accent-gold);
}

.scroll-line {
    width: 1px;
    height: 40px;
    background: var(--accent-gold);
    margin: 0 auto 0.5rem;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

.bg-gold {
    background: linear-gradient(135deg, var(--accent-gold), var(--accent-gold-light)) !important;
}

.text-gold {
    color: var(--accent-gold) !important;
}
</style>
@endpush
