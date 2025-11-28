@extends('admin.layouts.app')

@section('title', 'Modifier la Catégorie')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5" data-aos="fade-down">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-2 text-light">Modifier la Catégorie</h1>
                    <p class="text-muted mb-0">Mettez à jour les informations de "{{ $category->name }}"</p>
                </div>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-gold">
                    <i class="fas fa-arrow-left me-2"></i>Retour
                </a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="admin-card" data-aos="fade-up">
                <div class="card-header border-0 bg-transparent">
                    <h5 class="card-title mb-0 text-light">
                        <i class="fas fa-edit me-2 text-gold"></i>Modification de la Catégorie
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $category) }}" method="POST" id="categoryForm">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label text-light">Nom de la catégorie *</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-dark border-light text-gold">
                                            <i class="fas fa-tag"></i>
                                        </span>
                                        <input type="text" class="form-control bg-dark border-light text-light"
                                               id="name" name="name"
                                               value="{{ old('name', $category->name) }}" required>
                                    </div>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="icon" class="form-label text-light">Icône</label>
                                    <select class="form-select bg-dark border-light text-light" id="icon" name="icon">
                                        <option value="">Choisir une icône</option>
                                        <option value="utensils" {{ old('icon', $category->icon) == 'utensils' ? 'selected' : '' }}>🍽️ Couverts</option>
                                        <option value="glass-cheers" {{ old('icon', $category->icon) == 'glass-cheers' ? 'selected' : '' }}>🥂 Verre</option>
                                        <option value="wine-bottle" {{ old('icon', $category->icon) == 'wine-bottle' ? 'selected' : '' }}>🍷 Bouteille</option>
                                        <option value="ice-cream" {{ old('icon', $category->icon) == 'ice-cream' ? 'selected' : '' }}>🍦 Glace</option>
                                        <option value="coffee" {{ old('icon', $category->icon) == 'coffee' ? 'selected' : '' }}>☕ Café</option>
                                        <option value="leaf" {{ old('icon', $category->icon) == 'leaf' ? 'selected' : '' }}>🌿 Végétarien</option>
                                        <option value="fish" {{ old('icon', $category->icon) == 'fish' ? 'selected' : '' }}>🐟 Poisson</option>
                                        <option value="fire" {{ old('icon', $category->icon) == 'fire' ? 'selected' : '' }}>🔥 Épicé</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label for="description" class="form-label text-light">Description</label>
                            <textarea class="form-control bg-dark border-light text-light"
                                      id="description" name="description"
                                      rows="4">{{ old('description', $category->description) }}</textarea>
                            <div class="form-text text-muted">
                                <span id="charCount">{{ strlen(old('description', $category->description)) }}</span>/200 caractères
                            </div>
                            @error('description')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-4 mt-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sort_order" class="form-label text-light">Ordre d'affichage</label>
                                    <input type="number" class="form-control bg-dark border-light text-light"
                                           id="sort_order" name="sort_order"
                                           value="{{ old('sort_order', $category->sort_order) }}"
                                           min="0" max="100">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-light">Paramètres</label>
                                    <div class="settings-grid">
                                        <div class="form-check form-switch setting-item">
                                            <input class="form-check-input" type="checkbox"
                                                   id="is_active" name="is_active" value="1"
                                                   {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label text-light" for="is_active">
                                                Catégorie active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-light">Aperçu</label>
                                    <div class="category-preview bg-dark rounded p-3 text-center">
                                        <div class="preview-icon mb-2">
                                            <i class="fas fa-{{ $category->icon ?? 'tag' }}" id="previewIcon"></i>
                                        </div>
                                        <span class="text-light" id="previewName">{{ $category->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Category Stats -->
                        <div class="category-stats mt-4 p-4 bg-dark rounded-3">
                            <h6 class="text-light mb-3">Statistiques de la catégorie</h6>
                            <div class="row g-3">
                                <div class="col-sm-4">
                                    <div class="stat-item text-center">
                                        <div class="stat-number text-gold">{{ $category->dishes_count }}</div>
                                        <div class="stat-label text-muted">Plats</div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="stat-item text-center">
                                        <div class="stat-number text-gold">{{ $category->created_at->diffForHumans() }}</div>
                                        <div class="stat-label text-muted">Créée</div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="stat-item text-center">
                                        <div class="stat-number text-gold">{{ $category->updated_at->diffForHumans() }}</div>
                                        <div class="stat-label text-muted">Modifiée</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="form-group mt-5 pt-4 border-top border-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-light me-2">
                                        <i class="fas fa-times me-2"></i>Annuler
                                    </a>
                                    <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-outline-gold">
                                        <i class="fas fa-eye me-2"></i>Voir
                                    </a>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-gold btn-lg">
                                        <i class="fas fa-save me-2"></i>Mettre à jour
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.category-stats {
    border-left: 4px solid var(--accent-gold);
}

.stat-item .stat-number {
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
}

.stat-item .stat-label {
    font-size: 0.8rem;
    margin-top: 0.25rem;
}

/* Reuse styles from create form */
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('categoryForm');
    const nameInput = document.getElementById('name');
    const iconSelect = document.getElementById('icon');
    const descriptionInput = document.getElementById('description');
    const charCount = document.getElementById('charCount');
    const previewIcon = document.getElementById('previewIcon');
    const previewName = document.getElementById('previewName');

    // Real-time preview
    function updatePreview() {
        previewName.textContent = nameInput.value || '{{ $category->name }}';

        if (iconSelect.value) {
            previewIcon.className = `fas fa-${iconSelect.value}`;
        } else {
            previewIcon.className = 'fas fa-tag';
        }
    }

    // Character count for description
    descriptionInput.addEventListener('input', function() {
        const count = this.value.length;
        charCount.textContent = count;

        if (count > 200) {
            charCount.classList.add('text-danger');
        } else {
            charCount.classList.remove('text-danger');
        }
    });

    // Event listeners for real-time updates
    nameInput.addEventListener('input', updatePreview);
    iconSelect.addEventListener('change', updatePreview);

    // Form validation
    form.addEventListener('submit', function(e) {
        const name = nameInput.value.trim();

        if (!name) {
            e.preventDefault();
            alert('Le nom de la catégorie est obligatoire');
            nameInput.focus();
            return;
        }

        if (descriptionInput.value.length > 200) {
            e.preventDefault();
            alert('La description ne peut pas dépasser 200 caractères');
            descriptionInput.focus();
            return;
        }

        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mise à jour...';
        submitBtn.disabled = true;
    });

    // Initialize preview
    updatePreview();
});
</script>
@endpush
