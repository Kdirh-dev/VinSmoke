@extends('admin.layouts.app')

@section('title', 'Gestion des Plats')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5" data-aos="fade-down">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-2 text-light">Gestion des Plats</h1>
                    <p class="text-muted mb-0">Créez et gérez votre carte gastronomique</p>
                </div>
                <a href="{{ route('admin.dishes.create') }}" class="btn btn-gold">
                    <i class="fas fa-plus me-2"></i>Nouveau Plat
                </a>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-4" data-aos="fade-up">
        <div class="col-12">
            <div class="admin-card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label text-light">Rechercher</label>
                            <input type="text" class="form-control bg-dark border-light text-light"
                                   placeholder="Nom du plat...">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-light">Catégorie</label>
                            <select class="form-select bg-dark border-light text-light">
                                <option value="">Toutes les catégories</option>
                                <option value="1">Entrées</option>
                                <option value="2">Plats Principaux</option>
                                <option value="3">Desserts</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-light">Statut</label>
                            <select class="form-select bg-dark border-light text-light">
                                <option value="">Tous les statuts</option>
                                <option value="available">Disponible</option>
                                <option value="unavailable">Indisponible</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-light">&nbsp;</label>
                            <button class="btn btn-outline-gold w-100">
                                <i class="fas fa-filter me-2"></i>Filtrer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dishes Grid -->
    <div class="row">
        @forelse($dishes as $dish)
        <div class="col-xl-4 col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
            <div class="admin-card h-100 dish-admin-card">
                <div class="card-body">
                    <!-- Dish Image -->
                    <div class="dish-image mb-3 position-relative">
                        @if($dish->image)
                            <img src="{{ asset('storage/' . $dish->image) }}"
                                 alt="{{ $dish->name }}"
                                 class="img-fluid rounded-3 w-100"
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-dark rounded-3 d-flex align-items-center justify-content-center"
                                 style="height: 200px;">
                                <i class="fas fa-utensils fa-3x text-muted"></i>
                            </div>
                        @endif

                        <!-- Status Badges -->
                        <div class="position-absolute top-0 end-0 p-2">
                            @if($dish->is_featured)
                            <span class="badge bg-warning text-dark me-1">
                                <i class="fas fa-star me-1"></i>Vedette
                            </span>
                            @endif
                            <span class="badge bg-{{ $dish->is_available ? 'success' : 'danger' }}">
                                {{ $dish->is_available ? 'Disponible' : 'Indisponible' }}
                            </span>
                        </div>
                    </div>

                    <!-- Dish Info -->
                    <div class="dish-info">
                        <h5 class="text-light mb-2">{{ $dish->name }}</h5>
                        <p class="text-muted mb-3">{{ Str::limit($dish->description, 100) }}</p>

                        <div class="dish-meta d-flex justify-content-between align-items-center mb-3">
                            <span class="text-gold fw-bold">{{ $dish->formatted_price }}</span>
                            <span class="badge bg-secondary">{{ $dish->category->name }}</span>
                        </div>

                        <!-- Actions -->
                        <div class="dish-actions">
                            <div class="btn-group w-100">
                                <a href="{{ route('admin.dishes.show', $dish) }}"
                                   class="btn btn-outline-light btn-sm"
                                   title="Voir détails">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.dishes.edit', $dish) }}"
                                   class="btn btn-outline-gold btn-sm"
                                   title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.dishes.destroy', $dish) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce plat ?')"
                                            title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12" data-aos="fade-up">
            <div class="admin-card text-center py-5">
                <i class="fas fa-utensils fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">Aucun plat trouvé</h4>
                <p class="text-muted mb-4">Commencez par créer votre premier plat.</p>
                <a href="{{ route('admin.dishes.create') }}" class="btn btn-gold">
                    <i class="fas fa-plus me-2"></i>Créer un Plat
                </a>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($dishes->hasPages())
    <div class="row mt-4">
        <div class="col-12">
            <div class="admin-card">
                <div class="card-body">
                    <nav aria-label="Pagination">
                        <ul class="pagination justify-content-center mb-0">
                            @if($dishes->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link bg-dark border-light text-muted">Précédent</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link bg-dark border-light text-light" href="{{ $dishes->previousPageUrl() }}">Précédent</a>
                                </li>
                            @endif

                            @foreach($dishes->getUrlRange(1, $dishes->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $dishes->currentPage() ? 'active' : '' }}">
                                    <a class="page-link bg-dark border-light text-light" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if($dishes->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link bg-dark border-light text-light" href="{{ $dishes->nextPageUrl() }}">Suivant</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link bg-dark border-light text-muted">Suivant</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@push('styles')
<style>
.dish-admin-card {
    transition: var(--transition);
    border: 1px solid var(--border-light);
}

.dish-admin-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
    border-color: var(--accent-gold);
}

.dish-image {
    position: relative;
}

.dish-meta {
    border-top: 1px solid var(--border-light);
    padding-top: 1rem;
}

.dish-actions .btn-group .btn {
    border-radius: 0;
    flex: 1;
}

.dish-actions .btn-group .btn:first-child {
    border-top-left-radius: var(--border-radius);
    border-bottom-left-radius: var(--border-radius);
}

.dish-actions .btn-group .btn:last-child {
    border-top-right-radius: var(--border-radius);
    border-bottom-right-radius: var(--border-radius);
}

.page-item.active .page-link {
    background: var(--accent-gold) !important;
    border-color: var(--accent-gold) !important;
    color: var(--primary-dark) !important;
}

.page-link:hover {
    background: var(--accent-gold) !important;
    border-color: var(--accent-gold) !important;
    color: var(--primary-dark) !important;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quick status toggle
    const statusBadges = document.querySelectorAll('.badge.bg-success, .badge.bg-danger');

    statusBadges.forEach(badge => {
        badge.addEventListener('click', function() {
            const dishId = this.closest('.dish-admin-card').dataset.dishId;
            const currentStatus = this.classList.contains('bg-success');

            // Here you would typically make an AJAX call to update the status
            console.log(`Toggle status for dish ${dishId} from ${currentStatus ? 'available' : 'unavailable'}`);
        });
    });

    // Search functionality
    const searchInput = document.querySelector('input[type="text"]');
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const dishes = document.querySelectorAll('.dish-admin-card');

        dishes.forEach(dish => {
            const dishName = dish.querySelector('h5').textContent.toLowerCase();
            if (dishName.includes(searchTerm)) {
                dish.style.display = 'block';
            } else {
                dish.style.display = 'none';
            }
        });
    });
});
</script>
@endpush
