@extends('admin.layouts.app')

@section('title', 'Gestion des Catégories')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5" data-aos="fade-down">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-2 text-light">Gestion des Catégories</h1>
                    <p class="text-muted mb-0">Organisez votre carte gastronomique</p>
                </div>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-gold">
                    <i class="fas fa-plus me-2"></i>Nouvelle Catégorie
                </a>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4" data-aos="fade-up">
            <div class="admin-card text-center">
                <div class="card-body">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-tags"></i>
                    </div>
                    <h3 class="stat-number">{{ $categories->count() }}</h3>
                    <p class="text-muted mb-0">Catégories</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="admin-card text-center">
                <div class="card-body">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3 class="stat-number">{{ $categories->sum('dishes_count') }}</h3>
                    <p class="text-muted mb-0">Plats total</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="admin-card text-center">
                <div class="card-body">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 class="stat-number">{{ $categories->where('is_active', true)->count() }}</h3>
                    <p class="text-muted mb-0">Catégories actives</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="admin-card text-center">
                <div class="card-body">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="stat-number">{{ $categories->where('sort_order', '<=', 5)->count() }}</h3>
                    <p class="text-muted mb-0">En vedette</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Table -->
    <div class="row">
        <div class="col-12" data-aos="fade-up">
            <div class="admin-card">
                <div class="card-header border-0 bg-transparent">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 text-light">
                            <i class="fas fa-list me-2 text-gold"></i>Toutes les Catégories
                        </h5>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control bg-dark border-light text-light"
                                   placeholder="Rechercher..." style="width: 200px;">
                            <button class="btn btn-outline-gold">
                                <i class="fas fa-filter"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($categories->count() > 0)
                        <div class="table-responsive">
                            <table class="table admin-table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Slug</th>
                                        <th>Plats</th>
                                        <th>Statut</th>
                                        <th>Ordre</th>
                                        <th>Création</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="category-icon me-3">
                                                    <i class="fas fa-{{ $category->icon ?? 'tag' }}"></i>
                                                </div>
                                                <div>
                                                    <strong class="text-light">{{ $category->name }}</strong>
                                                    @if($category->description)
                                                        <br>
                                                        <small class="text-muted">{{ Str::limit($category->description, 50) }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <code class="text-muted">{{ $category->slug }}</code>
                                        </td>
                                        <td>
                                            <span class="badge bg-dark rounded-pill">
                                                {{ $category->dishes_count }} plats
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $category->is_active ? 'success' : 'danger' }} rounded-pill">
                                                {{ $category->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-gold fw-bold">{{ $category->sort_order }}</span>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                {{ $category->created_at->format('d/m/Y') }}
                                            </small>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.categories.show', $category) }}"
                                                   class="btn btn-outline-light btn-sm"
                                                   title="Voir détails">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.categories.edit', $category) }}"
                                                   class="btn btn-outline-gold btn-sm"
                                                   title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.categories.destroy', $category) }}"
                                                      method="POST"
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-outline-danger btn-sm"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"
                                                            title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-tags fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">Aucune catégorie</h4>
                            <p class="text-muted mb-4">Commencez par créer votre première catégorie.</p>
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-gold">
                                <i class="fas fa-plus me-2"></i>Créer une Catégorie
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.category-icon {
    width: 40px;
    height: 40px;
    background: rgba(200, 169, 126, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-gold);
}

.stat-icon {
    width: 60px;
    height: 60px;
    background: rgba(200, 169, 126, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: var(--accent-gold);
    font-size: 1.5rem;
}

.table-hover tbody tr:hover {
    background: rgba(200, 169, 126, 0.05) !important;
}

.btn-group .btn {
    border-radius: 6px;
    margin: 0 2px;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quick status toggle
    const statusBadges = document.querySelectorAll('.badge.bg-success, .badge.bg-danger');

    statusBadges.forEach(badge => {
        badge.style.cursor = 'pointer';
        badge.addEventListener('click', function() {
            const categoryId = this.closest('tr').dataset.categoryId;
            const currentStatus = this.classList.contains('bg-success');

            // AJAX call to toggle status
            fetch(`/admin/categories/${categoryId}/toggle`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    is_active: !currentStatus
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.classList.toggle('bg-success');
                    this.classList.toggle('bg-danger');
                    this.textContent = currentStatus ? 'Inactive' : 'Active';
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // Search functionality
    const searchInput = document.querySelector('input[type="text"]');
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const categoryName = row.querySelector('strong').textContent.toLowerCase();
            if (categoryName.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
</script>
@endpush
