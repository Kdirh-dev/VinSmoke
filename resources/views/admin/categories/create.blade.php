@extends('admin.layouts.app')

@section('title', 'Nouvelle Catégorie')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5" data-aos="fade-down">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-2 text-light">Nouvelle Catégorie</h1>
                    <p class="text-muted mb-0">Ajoutez une nouvelle catégorie à votre carte</p>
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
                        <i class="fas fa-plus me-2 text-gold"></i>Informations de la Catégorie
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST" id="categoryForm">
                        @csrf

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label text-light">Nom de la catégorie *</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-dark border-light text-gold">
                                            <i class="fas fa-tag"></i>
                                        </span>
                                        <input type="text" class="form-control bg-dark border-light text-light"
                                               id="name" name="name" value="{{ old('name') }}"
                                               placeholder="Ex: Entrées, Plats Principaux..." required>
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
                                        <option value="utensils" {{ old('icon') == 'utensils' ? 'selected' : '' }}>🍽️ Couverts</option>
                                        <option value="glass-cheers" {{ old('icon') == 'glass-cheers' ? 'selected' : '' }}>🥂 Verre</option>
                                        <option value="wine-bottle" {{ old('icon') == 'wine-bottle' ? 'selected' : '' }}>🍷 Bouteille</option>
                                        <option value="ice-cream" {{ old('icon') == 'ice-cream' ? 'selected' : '' }}>🍦 Glace</option>
                                        <option value="coffee" {{ old('icon') == 'coffee' ? 'selected' : '' }}>☕ Café</option>
                                        <option value="leaf" {{ old('icon') == 'leaf' ? 'selected' : '' }}>🌿 Végétarien</option>
                                        <option value="fish" {{ old('icon') == 'fish' ? 'selected' : '' }}>🐟 Poisson</option>
                                        <option value="fire" {{ old('icon') == 'fire' ? 'selected' : '' }}>🔥 Épicé</option>
                                    </select>
                                    <div class="form-text text-muted">
                                        Icône facultative pour l'affichage
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label for="description" class="form-label text-light">Description</label>
                            <textarea class="form-control bg-dark border-light text-light"
                                      id="description" name="description"
                                      rows="4" placeholder="Description de la catégorie...">{{ old('description') }}</textarea>
                            <div class="form-text text-muted">
                                <span id="charCount">0</span>/200 caractères
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
                                           value="{{ old('sort_order', $categories->max('sort_order') + 1) }}"
                                           min="0" max="100">
                                    <div class="form-text text-muted">
                                        Définit l'ordre dans le menu
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-light">Paramètres</label>
                                    <div class="settings-grid">
                                        <div class="form-check form-switch setting-item">
                                            <input class="form-check-input" type="checkbox"
                                                   id="is_active" name="is_active" value="1" checked>
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
                                            <i class="fas fa-tag" id="previewIcon"></i>
                                        </div>
                                        <span class="text-light" id="previewName">Nom</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="form-group mt-5 pt-4 border-top border-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-light">
                                    <i class="fas fa-times me-2"></i>Annuler
                                </a>
                                <button type="submit" class="btn btn-gold btn-lg">
                                    <i class="fas fa-save me-2"></i>Créer la Catégorie
                                </button>
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
.form-group {
    margin-bottom: 1.5rem;
}

.input-group-text {
    border-right: none;
}

.form-control:focus,
.form-select:focus {
    border-color: var(--accent-gold);
    box-shadow: 0 0 0 0.2rem rgba(200, 169, 126, 0.25);
    background-color: var(--primary-light);
    color: var(--text-light);
}

.input-group:focus-within .input-group-text {
    border-color: var(--accent-gold);
    background: var(--accent-gold);
    color: var(--primary-dark);
}

.settings-grid {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.setting-item {
    padding: 0.75rem;
    background: rgba(255, 255, 255, 0.05);
    border-radius: var(--border-radius);
    border: 1px solid var(--border-light);
}

.form-check-input:checked {
    background-color: var(--accent-gold);
    border-color: var(--accent-gold);
}

.category-preview {
    border: 2px solid var(--border-light);
    transition: var(--transition);
}

.category-preview:hover {
    border-color: var(--accent-gold);
}

.preview-icon {
    font-size: 1.5rem;
    color: var(--accent-gold);
}

.preview-icon i {
    transition: var(--transition);
}
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
        previewName.textContent = nameInput.value || 'Nom';

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
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Création...';
        submitBtn.disabled = true;
    });

    // Auto-generate slug from name
    nameInput.addEventListener('blur', function() {
        if (this.value && !this.dataset.slugGenerated) {
            const slug = this.value
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

            // In a real app, you might want to set this to a hidden slug field
            console.log('Generated slug:', slug);
            this.dataset.slugGenerated = true;
        }
    });

    // Initialize preview
    updatePreview();
    descriptionInput.dispatchEvent(new Event('input'));
});
</script>
@endpush
