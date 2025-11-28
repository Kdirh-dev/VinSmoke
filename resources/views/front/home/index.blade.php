@extends('front.layouts.app')

@section('title', 'VinSmoke - Restaurant Rafiné à Lomé')
@section('description', 'Découvrez VinSmoke, restaurant raffiné à Lomé. Cuisine d\'exception, carte des vins sélectionnée et ambiance élégante.')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1>VinSmoke Restaurant</h1>
            <p class="lead">Une expérience culinaire exceptionnelle au cœur de Lomé</p>
            <div class="hero-buttons">
                <a href="{{ route('menu') }}" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-utensils me-2"></i>Découvrir le Menu
                </a>
                <a href="{{ route('reservation.create') }}" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-calendar-check me-2"></i>Réserver une Table
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Dishes Section -->
<section class="section-padding bg-light">
    <div class="container">
        <h2 class="section-title">Nos Spécialités</h2>
        <div class="row">
            @foreach($featuredDishes as $dish)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="dish-card card h-100">
                    <img src="{{ asset('storage/' . $dish->image) }}" class="card-img-top" alt="{{ $dish->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $dish->name }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($dish->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 text-primary mb-0">{{ $dish->formatted_price }}</span>
                            <a href="{{ route('menu.show', $dish->slug) }}" class="btn btn-outline-primary">
                                Voir détails
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('menu') }}" class="btn btn-primary btn-lg">
                Voir tout le menu <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Gallery Preview Section -->
<section class="section-padding">
    <div class="container">
        <h2 class="section-title">Notre Univers</h2>
        <div class="row">
            @foreach($galleryImages as $image)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="gallery-item position-relative overflow-hidden rounded">
                    <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid w-100" alt="{{ $image->title }}" style="height: 250px; object-fit: cover;">
                    <div class="gallery-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                        <h5 class="text-white text-center">{{ $image->title }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{ route('gallery') }}" class="btn btn-outline-primary btn-lg">
                Voir la galerie complète
            </a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.hero-section {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
}

.gallery-item {
    transition: var(--transition);
}

.gallery-item:hover {
    transform: scale(1.05);
}

.gallery-overlay {
    background: rgba(0, 0, 0, 0.7);
    opacity: 0;
    transition: var(--transition);
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}
</style>
@endpush

@push('scripts')
<script>
// Animation du header au scroll
window.addEventListener('scroll', function() {
    const header = document.querySelector('.custom-header');
    if (window.scrollY > 100) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});
</script>
@endpush
