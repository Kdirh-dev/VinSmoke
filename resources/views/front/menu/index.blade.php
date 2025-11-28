@extends('front.layouts.app')

@section('title', 'Notre Carte Gastronomique - VinSmoke')
@section('description', 'Découvrez notre carte exceptionnelle : plats signature, produits frais et créations uniques de nos chefs. Une expérience culinaire raffinée.')

@section('content')

<!-- Menu Hero -->
<section class="menu-hero section-padding bg-dark text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up">
                <h1 class="hero-title mb-4">Notre Carte</h1>
                <p class="hero-subtitle">Une symphonie de saveurs soigneusement orchestrée par nos chefs</p>
            </div>
        </div>
    </div>
</section>

<!-- Menu Navigation -->
<section class="menu-navigation py-4 bg-light sticky-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="menu-categories">
                    <div class="nav nav-pills justify-content-center" id="menuCategories">
                        @foreach($categories as $category)
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                data-bs-toggle="pill"
                                data-bs-target="#category-{{ $category->id }}">
                            <i class="fas fa-{{ $category->icon ?? 'utensils' }} me-2"></i>
                            {{ $category->name }}
                        </button>
                        @endforeach
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Menu Content -->
<section class="section-padding">
    <div class="container">
        <div class="tab-content" id="menuContent">
            @foreach($categories as $category)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                 id="category-{{ $category->id }}">

                <div class="category-header text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">{{ $category->name }}</h2>
                    @if($category->description)
                        <p class="section-subtitle">{{ $category->description }}</p>
                    @endif
                </div>

                <div class="row g-4">
                    @foreach($category->activeDishes as $dish)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                        <div class="menu-item card border-0 shadow-sm h-100">
                            <div class="row g-0 h-100">
                                <div class="col-md-4">
                                    <div class="menu-item-image position-relative h-100">
                                        <img src="{{ $dish->image ? asset('storage/' . $dish->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
                                             class="img-fluid h-100 w-100"
                                             alt="{{ $dish->name }}"
                                             style="object-fit: cover;">
                                        @if($dish->is_featured)
                                        <div class="featured-badge">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column h-100 p-4">
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <h5 class="card-title mb-0">{{ $dish->name }}</h5>
                                                <span class="price text-gold fw-bold">{{ $dish->formatted_price }}</span>
                                            </div>
                                            <p class="card-text text-muted mb-3">{{ $dish->description }}</p>
                                        </div>
                                        <div class="menu-item-actions mt-auto">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="category-tag">{{ $category->name }}</span>
                                                <a href="{{ route('menu.show', $dish->slug) }}"
                                                   class="btn btn-outline-gold btn-sm">
                                                    Détails <i class="fas fa-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <!-- Menu CTA -->
        <div class="text-center mt-5" data-aos="fade-up">
            <div class="cta-card bg-dark text-white rounded-3 p-5">
                <h3 class="mb-3">Prêt à vivre l'expérience ?</h3>
                <p class="mb-4 opacity-75">Réservez votre table et laissez-nous vous surprendre</p>
                <a href="{{ route('reservation.create') }}" class="btn btn-gold btn-lg">
                    <i class="fas fa-calendar-check me-2"></i>Réserver Maintenant
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.menu-hero {
    background: linear-gradient(135deg,
        rgba(26, 26, 26, 0.9) 0%,
        rgba(26, 26, 26, 0.7) 100%),
        url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
}

.menu-navigation {
    border-bottom: 1px solid var(--border-light);
    backdrop-filter: blur(10px);
}

.menu-categories .nav-link {
    background: transparent;
    color: var(--text-dark);
    border: 2px solid transparent;
    border-radius: 50px;
    padding: 0.75rem 1.5rem;
    margin: 0 0.5rem;
    transition: var(--transition);
}

.menu-categories .nav-link.active,
.menu-categories .nav-link:hover {
    background: var(--accent-gold);
    color: var(--primary-dark);
    border-color: var(--accent-gold);
    transform: translateY(-2px);
}

.menu-item {
    transition: var(--transition);
    border-radius: var(--border-radius-lg);
    overflow: hidden;
}

.menu-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
}

.menu-item-image {
    position: relative;
}

.featured-badge {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background: var(--accent-gold);
    color: var(--primary-dark);
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
}

.category-tag {
    background: var(--primary-light);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
}

.btn-outline-gold {
    border: 2px solid var(--accent-gold);
    color: var(--accent-gold);
    background: transparent;
    transition: var(--transition);
}

.btn-outline-gold:hover {
    background: var(--accent-gold);
    color: var(--primary-dark);
    transform: translateY(-2px);
}

.cta-card {
    background: linear-gradient(135deg, var(--primary-dark), var(--primary-light)) !important;
    box-shadow: var(--shadow-strong);
}

.price {
    font-size: 1.1rem;
    font-weight: 700;
}

/* Smooth scrolling for category navigation */
html {
    scroll-behavior: smooth;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll to category when clicking nav items
    const categoryLinks = document.querySelectorAll('.menu-categories .nav-link');

    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = this.getAttribute('data-bs-target');
            const targetElement = document.querySelector(target);

            if (targetElement) {
                const offsetTop = targetElement.offsetTop - 100;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Add intersection observer for active state
    const observerOptions = {
        root: null,
        rootMargin: '-20% 0px -70% 0px',
        threshold: 0
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const categoryId = entry.target.id;
                const correspondingLink = document.querySelector(`[data-bs-target="#${categoryId}"]`);

                if (correspondingLink) {
                    // Remove active class from all links
                    categoryLinks.forEach(link => link.classList.remove('active'));
                    // Add active class to current link
                    correspondingLink.classList.add('active');
                }
            }
        });
    }, observerOptions);

    // Observe all category sections
    document.querySelectorAll('.tab-pane').forEach(section => {
        observer.observe(section);
    });
});
</script>
@endpush
