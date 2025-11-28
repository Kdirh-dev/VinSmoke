@extends('admin.layouts.app')

@section('title', 'Nouveau Plat')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5" data-aos="fade-down">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-2 text-light">Créer un Nouveau Plat</h1>
                    <p class="text-muted mb-0">Ajoutez une nouvelle création à votre carte gastronomique</p>
                </div>
                <a href="{{ route('admin.dishes.index') }}" class="btn btn-outline-gold">
                    <i class="fas fa-arrow-left me-2"></i>Retour
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8" data-aos="fade-right">
            <div class="admin-card">
                <div class="card-header border-0 bg-transparent">
                    <h5 class="card-title mb-0 text-light">
                        <i class="fas fa-utensils me-2 text-gold"></i>Informations du Plat
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data" id="dishForm">
                        @csrf

                        <!-- Basic Information -->
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label text-light">Nom du plat *</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-dark border-light text-gold">
                                            <i class="fas fa-utensils"></i>
                                        </span>
                                        <input type="text" class="form-control bg-dark border-light text-light"
                                               id="name" name="name" value="{{ old('name') }}"
                                               placeholder="Ex: Filet de Boeuf Rossini" required>
                                    </div>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price" class="form-label text-light">Prix (FCFA) *</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-dark border-light text-gold">
                                            <i class="fas fa-tag"></i>
                                        </span>
                                        <input type="number" step="0.01" class="form-control bg-dark border-light text-light"
                                               id="price" name="price" value="{{ old('price') }}"
                                               placeholder="0.00" required>
                                    </div>
                                    @error('price')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Category & Image -->
                        <div class="row g-4 mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id" class="form-label text-light">Catégorie *</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-dark border-light text-gold">
                                            <i class="fas fa-tags"></i>
                                        </span>
                                        <select class="form-select bg-dark border-light text-light"
                                                id="category_id" name="category_id" required>
                                            <option value="">Sélectionnez une catégorie</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="form-label text-light">Image du plat</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-dark border-light text-gold">
                                            <i class="fas fa-image"></i>
                                        </span>
                                        <input type="file" class="form-control bg-dark border-light text-light"
                                               id="image" name="image" accept="image/*">
                                    </div>
                                    <div class="form-text text-muted">
                                        Formats: JPEG, PNG, JPG, GIF. Taille max: 2MB
                                    </div>
                                    @error('image')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group mt-4">
                            <label for="description" class="form-label text-light">Description *</label>
                            <textarea class="form-control bg-dark border-light text-light"
                                      id="description" name="description" rows="5"
                                      placeholder="Décrivez votre plat, ses ingrédients et sa préparation..."
                                      required>{{ old('description') }}</textarea>
                            <div class="form-text text-muted">
                                <span id="charCount">0</span>/500 caractères
                            </div>
                            @error('description')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Settings -->
                        <div class="row g-4 mt-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-light">Paramètres</label>
                                    <div class="settings-grid">
                                        <div class="form-check form-switch setting-item">
                                            <input class="form-check-input" type="checkbox"
                                                   id="is_available" name="is_available" value="1" checked>
                                            <label class="form-check-label text-light" for="is_available">
                                                Disponible
                                            </label>
                                        </div>
                                        <div class="form-check form-switch setting-item">
                                            <input class="form-check-input" type="checkbox"
                                                   id="is_featured" name="is_featured" value="1">
                                            <label class="form-check-label text-light" for="is_featured">
                                                En vedette
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sort_order" class="form-label text-light">Ordre d'affichage</label>
                                    <input type="number" class="form-control bg-dark border-light text-light"
                                           id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}"
                                           min="0" max="100">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-light">Aperçu du prix</label>
                                    <div class="price-preview bg-dark rounded p-3 text-center">
                                        <span class="text-gold fw-bold fs-4" id="pricePreview">0 FCFA</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mt-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('admin.dishes.index') }}" class="btn btn-outline-light">
                                    <i class="fas fa-times me-2"></i>Annuler
                                </a>
                                <button type="submit" class="btn btn-gold btn-lg">
                                    <i class="fas fa-save me-2"></i>Créer le Plat
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4" data-aos="fade-left" data-aos-delay="200">
            <!-- Image Preview -->
            <div class="admin-card mb-4">
                <div class="card-header border-0 bg-transparent">
                    <h5 class="card-title mb-0 text-light">
                        <i class="fas fa-eye me-2 text-gold"></i>Aperçu de l'Image
                    </h5>
                </div>
                <div class="card-body text-center">
                    <div id="imagePreview" class="image-preview-container mb-3">
                        <div class="placeholder-content">
                            <i class="fas fa-image fa-3x text-muted mb-3"></i>
                            <p class="text-muted mb-0">Aperçu de l'image</p>
                        </div>
                        <img id="previewImage" class="preview-image" style="display: none;">
                    </div>
                    <small class="text-muted">L'aperçu se mettra à jour automatiquement</small>
                </div>
            </div>

            <!-- Tips -->
            <div class="admin-card">
                <div class="card-header border-0 bg-transparent">
                    <h5 class="card-title mb-0 text-light">
                        <i class="fas fa-lightbulb me-2 text-warning"></i>Conseils
                    </h5>
                </div>
                <div class="card-body">
                    <div class="tips-list">
                        <div class="tip-item d-flex align-items-start mb-3">
                            <div class="tip-icon me-3">
                                <i class="fas fa-camera text-gold"></i>
                            </div>
                            <div class="tip-content">
                                <h6 class="text-light mb-1">Image de qualité</h6>
                                <p class="text-muted small mb-0">Utilisez une photo nette et bien éclairée</p>
                            </div>
                        </div>
                        <div class="tip-item d-flex align-items-start mb-3">
                            <div class="tip-icon me-3">
                                <i class="fas fa-pen text-gold"></i>
                            </div>
                            <div class="tip-content">
                                <h6 class="text-light mb-1">Description engageante</h6>
                                <p class="text-muted small mb-0">Décrivez les saveurs et ingrédients</p>
                            </div>
                        </div>
                        <div class="tip-item d-flex align-items-start">
                            <div class="tip-icon me-3">
                                <i class="fas fa-star text-gold"></i>
                            </div>
                            <div class="tip-content">
                                <h6 class="text-light mb-1">Plats vedettes</h6>
                                <p class="text-muted small mb-0">Mettez en avant vos spécialités</p>
                            </div>
                        </div>
                    </div>
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

.form-check-input:focus {
    border-color: var(--accent-gold);
    box-shadow: 0 0 0 0.2rem rgba(200, 169, 126, 0.25);
}

.price-preview {
    border: 2px solid var(--accent-gold);
}

.image-preview-container {
    position: relative;
    min-height: 200px;
    border: 2px dashed var(--border-light);
    border-radius: var(--border-radius);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.image-preview-container:hover {
    border-color: var(--accent-gold);
}

.placeholder-content {
    text-align: center;
}

.preview-image {
    max-width: 100%;
    max-height: 200px;
    border-radius: var(--border-radius);
    object-fit: cover;
}

.tip-icon {
    width: 32px;
    height: 32px;
    background: rgba(200, 169, 126, 0.1);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.tip-content h6 {
    font-size: 0.9rem;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image');
    const previewImage = document.getElementById('previewImage');
    const imagePreview = document.getElementById('imagePreview');
    const placeholderContent = imagePreview.querySelector('.placeholder-content');
    const priceInput = document.getElementById('price');
    const pricePreview = document.getElementById('pricePreview');
    const descriptionInput = document.getElementById('description');
    const charCount = document.getElementById('charCount');

    // Image preview
    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                previewImage.src = reader.result;
                previewImage.style.display = 'block';
                placeholderContent.style.display = 'none';
            });

            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = 'none';
            placeholderContent.style.display = 'flex';
        }
    });

    // Price preview
    priceInput.addEventListener('input', function() {
        const price = parseFloat(this.value) || 0;
        pricePreview.textContent = new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF'
        }).format(price).replace('XOF', 'FCFA');
    });

    // Character count for description
    descriptionInput.addEventListener('input', function() {
        const count = this.value.length;
        charCount.textContent = count;

        if (count > 500) {
            charCount.classList.add('text-danger');
        } else {
            charCount.classList.remove('text-danger');
        }
    });

    // Form validation
    const form = document.getElementById('dishForm');
    form.addEventListener('submit', function(e) {
        const price = parseFloat(priceInput.value);
        if (price < 0) {
            e.preventDefault();
            alert('Le prix ne peut pas être négatif');
            priceInput.focus();
        }

        if (descriptionInput.value.length > 500) {
            e.preventDefault();
            alert('La description ne peut pas dépasser 500 caractères');
            descriptionInput.focus();
        }
    });

    // Initialize price preview
    priceInput.dispatchEvent(new Event('input'));
    descriptionInput.dispatchEvent(new Event('input'));
});
</script>
@endpush
