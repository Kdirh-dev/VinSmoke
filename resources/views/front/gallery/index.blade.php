@extends('front.layouts.app')

@section('title', 'Galerie - VinSmoke Restaurant')
@section('description', 'Découvrez l\'univers VinSmoke à travers notre galerie photos : ambiance, plats signature et moments inoubliables.')

@section('content')

<!-- Gallery Hero -->
<section class="gallery-hero section-padding bg-dark text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up">
                <h1 class="hero-title mb-4">Notre Galerie</h1>
                <p class="hero-subtitle">Immersion dans l'univers raffiné de VinSmoke</p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Filters -->
<section class="gallery-filters py-4 bg-light sticky-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="filters-container">
                    <div class="filter-buttons">
                        <button class="filter-btn active" data-filter="all">
                            <i class="fas fa-th-large me-2"></i>Tout voir
                        </button>
                        <button class="filter-btn" data-filter="restaurant">
                            <i class="fas fa-store me-2"></i>Restaurant
                        </button>
                        <button class="filter-btn" data-filter="dishes">
                            <i class="fas fa-utensils me-2"></i>Plats
                        </button>
                        <button class="filter-btn" data-filter="events">
                            <i class="fas fa-glass-cheers me-2"></i>Événements
                        </button>
                    </div>
                    <div class="filter-search">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Rechercher une image..." id="gallerySearch">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="section-padding">
    <div class="container">
        <div class="row g-4" id="galleryGrid">
            @forelse($images as $image)
            <div class="col-xl-4 col-lg-6 gallery-item" data-category="restaurant" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="gallery-card position-relative overflow-hidden rounded-4 shadow-lg">
                    <img src="{{ asset('storage/' . $image->image) }}"
                         class="gallery-image"
                         alt="{{ $image->title }}"
                         loading="lazy">
                    <div class="gallery-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-end">
                        <div class="overlay-content p-4 w-100">
                            <div class="content-wrapper">
                                <h5 class="text-white mb-2">{{ $image->title }}</h5>
                                @if($image->description)
                                    <p class="text-light opacity-75 mb-3">{{ $image->description }}</p>
                                @endif
                                <div class="gallery-actions">
                                    <button class="btn btn-gold btn-sm view-btn"
                                            data-image="{{ asset('storage/' . $image->image) }}"
                                            data-title="{{ $image->title }}"
                                            data-description="{{ $image->description }}">
                                        <i class="fas fa-expand me-1"></i>Agrandir
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-badge position-absolute top-3 end-3">
                        <span class="badge bg-dark bg-opacity-75">
                            <i class="fas fa-image me-1"></i>
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5" data-aos="fade-up">
                <div class="empty-state">
                    <i class="fas fa-images fa-4x text-muted mb-4"></i>
                    <h3 class="text-muted mb-3">Galerie en cours de préparation</h3>
                    <p class="text-muted mb-4">Notre photographe est en train de capturer les plus beaux moments de VinSmoke.</p>
                    <a href="{{ route('home') }}" class="btn btn-gold">
                        <i class="fas fa-arrow-left me-2"></i>Retour à l'accueil
                    </a>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Load More -->
        @if($images->count() >= 6)
        <div class="text-center mt-5" data-aos="fade-up">
            <button class="btn btn-outline-dark btn-lg" id="loadMore">
                <i class="fas fa-plus me-2"></i>Charger plus d'images
            </button>
        </div>
        @endif
    </div>
</section>

<!-- Gallery CTA -->
<section class="section-padding bg-gold">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <h2 class="text-dark mb-3">Inspiré par notre univers ?</h2>
                <p class="text-dark mb-4 opacity-75">
                    Réservez votre table et venez vivre l'expérience VinSmoke en personne.
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

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-dark border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title text-light" id="modalTitle"></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-0">
                <img id="modalImage" class="img-fluid" style="max-height: 70vh; object-fit: contain;">
                <p class="text-light mt-3 px-4" id="modalDescription"></p>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
.gallery-hero {
    background: linear-gradient(135deg,
        rgba(26, 26, 26, 0.9) 0%,
        rgba(26, 26, 26, 0.7) 100%),
        url('https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
}

.filters-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.filter-buttons {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.filter-btn {
    background: transparent;
    border: 2px solid var(--border-light);
    color: var(--text-dark);
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    transition: var(--transition);
    font-weight: 500;
}

.filter-btn.active,
.filter-btn:hover {
    background: var(--accent-gold);
    border-color: var(--accent-gold);
    color: var(--primary-dark);
    transform: translateY(-2px);
}

.search-box {
    position: relative;
    min-width: 250px;
}

.search-box i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-gray);
}

.search-box input {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 2.5rem;
    border: 2px solid var(--border-light);
    border-radius: 50px;
    background: white;
    transition: var(--transition);
}

.search-box input:focus {
    border-color: var(--accent-gold);
    outline: none;
    box-shadow: 0 0 0 3px rgba(200, 169, 126, 0.1);
}

.gallery-card {
    transition: var(--transition);
    cursor: pointer;
}

.gallery-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: var(--shadow-strong);
}

.gallery-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
    transition: var(--transition);
}

.gallery-card:hover .gallery-image {
    transform: scale(1.1);
}

.gallery-overlay {
    background: linear-gradient(transparent 40%, rgba(0, 0, 0, 0.8) 100%);
    opacity: 0;
    transition: var(--transition);
    padding: 2rem;
}

.gallery-card:hover .gallery-overlay {
    opacity: 1;
}

.overlay-content {
    transform: translateY(20px);
    transition: var(--transition);
}

.gallery-card:hover .overlay-content {
    transform: translateY(0);
}

.gallery-actions {
    opacity: 0;
    transition: var(--transition);
    transform: translateY(10px);
}

.gallery-card:hover .gallery-actions {
    opacity: 1;
    transform: translateY(0);
}

.view-btn {
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
}

.view-btn:hover {
    background: var(--accent-gold);
    border-color: var(--accent-gold);
    color: var(--primary-dark);
}

.empty-state {
    padding: 4rem 2rem;
}

.gallery-badge .badge {
    backdrop-filter: blur(10px);
    font-size: 0.8rem;
}

/* Modal Styles */
.modal-content {
    border-radius: var(--border-radius-lg);
    overflow: hidden;
}

.modal-body {
    background: var(--primary-dark);
}

@media (max-width: 768px) {
    .filters-container {
        flex-direction: column;
        align-items: stretch;
    }

    .filter-buttons {
        justify-content: center;
    }

    .search-box {
        min-width: auto;
    }

    .gallery-image {
        height: 250px;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const searchInput = document.getElementById('gallerySearch');
    const viewButtons = document.querySelectorAll('.view-btn');
    const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');

    // Filter functionality
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');

            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Filter items
            galleryItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        galleryItems.forEach(item => {
            const title = item.querySelector('h5').textContent.toLowerCase();
            const description = item.querySelector('p')?.textContent.toLowerCase() || '';

            if (title.includes(searchTerm) || description.includes(searchTerm)) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'scale(1)';
                }, 50);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'scale(0.8)';
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        });
    });

    // Modal functionality
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const imageUrl = this.getAttribute('data-image');
            const title = this.getAttribute('data-title');
            const description = this.getAttribute('data-description');

            modalImage.src = imageUrl;
            modalTitle.textContent = title;
            modalDescription.textContent = description;

            imageModal.show();
        });
    });

    // Load more functionality
    const loadMoreBtn = document.getElementById('loadMore');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Chargement...';
            this.disabled = true;

            // Simulate loading
            setTimeout(() => {
                // In a real app, you would fetch more data via AJAX
                this.style.display = 'none';
                // Show message
                const message = document.createElement('div');
                message.className = 'alert alert-info mt-3';
                message.innerHTML = '<i class="fas fa-info-circle me-2"></i>Toutes les images sont affichées';
                this.parentNode.appendChild(message);
            }, 1500);
        });
    }

    // Lazy loading
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.getAttribute('data-src');
                img.classList.remove('lazy');
                observer.unobserve(img);
            }
        });
    });

    document.querySelectorAll('.gallery-image').forEach(img => {
        imageObserver.observe(img);
    });
});
</script>
@endpush
