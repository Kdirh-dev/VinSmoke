@extends('front.layouts.app')

@section('title', $dish->name . ' - VinSmoke')
@section('description', $dish->description)

@section('content')

<!-- Breadcrumb -->
<nav class="breadcrumb-nav py-4 bg-light" data-aos="fade-down">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('menu') }}" class="text-decoration-none">Notre Carte</a></li>
            <li class="breadcrumb-item"><a href="#category-{{ $dish->category_id }}" class="text-decoration-none">{{ $dish->category->name }}</a></li>
            <li class="breadcrumb-item active text-gold">{{ $dish->name }}</li>
        </ol>
    </div>
</nav>

<!-- Dish Hero -->
<section class="dish-hero section-padding" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="dish-image-wrapper position-relative">
                    <div class="dish-badge-container">
                        @if($dish->is_featured)
                        <span class="dish-badge featured">
                            <i class="fas fa-star me-1"></i>Signature
                        </span>
                        @endif
                        <span class="dish-badge category">
                            {{ $dish->category->name }}
                        </span>
                    </div>
                    <img src="{{ $dish->image ? asset('storage/' . $dish->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
                         alt="{{ $dish->name }}"
                         class="img-fluid rounded-3 shadow-lg">
                    <div class="image-overlay"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="dish-content ps-lg-5">
                    <span class="section-label text-gold">Détails du Plat</span>
                    <h1 class="dish-title mb-4">{{ $dish->name }}</h1>

                    <div class="dish-meta mb-4">
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-tag"></i>
                            </div>
                            <div class="meta-content">
                                <span class="meta-label">Catégorie</span>
                                <span class="meta-value">{{ $dish->category->name }}</span>
                            </div>
                        </div>
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="meta-content">
                                <span class="meta-label">Préparation</span>
                                <span class="meta-value">15-25 min</span>
                            </div>
                        </div>
                    </div>

                    <div class="dish-price mb-4">
                        <span class="price-amount">{{ $dish->formatted_price }}</span>
                        <span class="price-note text-muted">Prix TTC</span>
                    </div>

                    <div class="dish-description mb-5">
                        <p class="lead">{{ $dish->description }}</p>
                    </div>

                    <div class="dish-actions">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <a href="{{ route('reservation.create') }}" class="btn btn-gold w-100 btn-lg">
                                    <i class="fas fa-calendar-check me-2"></i>Réserver
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('menu') }}#category-{{ $dish->category_id }}"
                                   class="btn btn-outline-dark w-100 btn-lg">
                                    <i class="fas fa-arrow-left me-2"></i>Retour au Menu
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ingredients Section -->
<section class="section-padding bg-light" data-aos="fade-up">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <span class="section-label text-gold">Composition</span>
                <h2 class="section-title mb-5">Ingrédients Sélectionnés</h2>

                <div class="ingredients-grid">
                    <div class="ingredient-item">
                        <div class="ingredient-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <span class="ingredient-name">Produits Frais</span>
                    </div>
                    <div class="ingredient-item">
                        <div class="ingredient-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <span class="ingredient-name">Herbes Aromatiques</span>
                    </div>
                    <div class="ingredient-item">
                        <div class="ingredient-icon">
                            <i class="fas fa-wine-bottle"></i>
                        </div>
                        <span class="ingredient-name">Sauces Maison</span>
                    </div>
                    <div class="ingredient-item">
                        <div class="ingredient-icon">
                            <i class="fas fa-pepper-hot"></i>
                        </div>
                        <span class="ingredient-name">Épices Sélectionnées</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Dishes -->
@if($relatedDishes->count() > 0)
<section class="section-padding" data-aos="fade-up">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label text-gold">Découvrir aussi</span>
            <h2 class="section-title">Autres Suggestions</h2>
            <p class="section-subtitle">Des plats qui pourraient vous plaire</p>
        </div>

        <div class="row g-4">
            @foreach($relatedDishes as $relatedDish)
            <div class="col-lg-3 col-md-6">
                <div class="related-dish-card card border-0 shadow-sm h-100">
                    <div class="card-img-wrapper position-relative">
                        <img src="{{ $relatedDish->image ? asset('storage/' . $relatedDish->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
                             class="card-img-top"
                             alt="{{ $relatedDish->name }}"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-overlay">
                            <a href="{{ route('menu.show', $relatedDish->slug) }}" class="btn btn-gold btn-sm">
                                Voir détails
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">{{ $relatedDish->name }}</h6>
                        <p class="card-text text-muted small">{{ Str::limit($relatedDish->description, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-gold fw-bold">{{ $relatedDish->formatted_price }}</span>
                            <a href="{{ route('menu.show', $relatedDish->slug) }}" class="btn btn-outline-gold btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Final CTA -->
<section class="section-padding bg-dark text-white" data-aos="fade-up">
    <div class="container text-center">
        <h2 class="mb-4">Tenté par cette création ?</h2>
        <p class="lead mb-5 opacity-75">Réservez votre table et laissez-nous vous faire vivre un moment exceptionnel</p>
        <a href="{{ route('reservation.create') }}" class="btn btn-gold btn-lg">
            <i class="fas fa-calendar-check me-2"></i>Réserver une Table
        </a>
    </div>
</section>

@endsection

@push('styles')
<style>
.breadcrumb-nav {
    border-bottom: 1px solid var(--border-light);
}

.breadcrumb-item.active {
    color: var(--accent-gold) !important;
}

.dish-image-wrapper {
    position: relative;
}

.dish-badge-container {
    position: absolute;
    top: 1.5rem;
    left: 1.5rem;
    z-index: 2;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.dish-badge {
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.dish-badge.featured {
    background: var(--accent-gold);
    color: var(--primary-dark);
}

.dish-badge.category {
    background: var(--primary-dark);
    color: white;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(200, 169, 126, 0.1) 0%, transparent 50%);
    border-radius: var(--border-radius);
}

.dish-title {
    font-size: 3rem;
    font-weight: 900;
    color: var(--primary-dark);
    line-height: 1.2;
}

.dish-meta {
    display: flex;
    gap: 2rem;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.meta-icon {
    width: 50px;
    height: 50px;
    background: var(--accent-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-dark);
    font-size: 1.2rem;
}

.meta-content {
    display: flex;
    flex-direction: column;
}

.meta-label {
    font-size: 0.8rem;
    color: var(--text-gray);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.meta-value {
    font-weight: 600;
    color: var(--primary-dark);
}

.dish-price {
    display: flex;
    align-items: baseline;
    gap: 1rem;
}

.price-amount {
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--accent-gold);
}

.price-note {
    font-size: 0.9rem;
}

.ingredients-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.ingredient-item {
    text-align: center;
    padding: 2rem 1rem;
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-soft);
    transition: var(--transition);
}

.ingredient-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
}

.ingredient-icon {
    width: 60px;
    height: 60px;
    background: var(--accent-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: var(--primary-dark);
    font-size: 1.5rem;
}

.ingredient-name {
    font-weight: 600;
    color: var(--primary-dark);
}

.related-dish-card {
    transition: var(--transition);
    border-radius: var(--border-radius);
    overflow: hidden;
}

.related-dish-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
}

.related-dish-card .card-overlay {
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

.related-dish-card:hover .card-overlay {
    opacity: 1;
}
</style>
@endpush
