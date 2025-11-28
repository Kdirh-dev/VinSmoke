@extends('admin.layouts.app')

@section('title', 'Modifier le Plat')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0">Modifier le Plat</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du plat *</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('name', $dish->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea class="form-control" id="description" name="description"
                                      rows="4" required>{{ old('description', $dish->description) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Prix (FCFA) *</label>
                                    <input type="number" step="0.01" class="form-control" id="price"
                                           name="price" value="{{ old('price', $dish->price) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Catégorie *</label>
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value="">Sélectionnez une catégorie</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $dish->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image du plat</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <div class="form-text">Laissez vide pour conserver l'image actuelle. Formats: JPEG, PNG, JPG, GIF. Max: 2MB</div>

                            @if($dish->image)
                            <div class="mt-2">
                                <label class="form-label">Image actuelle :</label>
                                <div>
                                    <img src="{{ asset('storage/' . $dish->image) }}"
                                         alt="{{ $dish->name }}"
                                         class="img-thumbnail"
                                         style="max-height: 200px;">
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_available"
                                               name="is_available" value="1"
                                               {{ old('is_available', $dish->is_available) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_available">Disponible</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_featured"
                                               name="is_featured" value="1"
                                               {{ old('is_featured', $dish->is_featured) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">En vedette</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Ordre d'affichage</label>
                                    <input type="number" class="form-control" id="sort_order"
                                           name="sort_order" value="{{ old('sort_order', $dish->sort_order) }}">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.dishes.index') }}" class="btn btn-secondary">Retour</a>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Aperçu actuel</h6>
                </div>
                <div class="card-body">
                    @if($dish->image)
                        <img src="{{ asset('storage/' . $dish->image) }}"
                             alt="{{ $dish->name }}"
                             class="img-fluid rounded mb-3"
                             style="max-height: 200px; object-fit: cover;">
                    @else
                        <div class="text-center text-muted">
                            <i class="fas fa-utensils fa-3x mb-3"></i>
                            <p>Aucune image</p>
                        </div>
                    @endif
                    <h6>{{ $dish->name }}</h6>
                    <p class="text-muted small">{{ $dish->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">{{ $dish->formatted_price }}</span>
                        <span class="badge bg-secondary">{{ $dish->category->name }}</span>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h6 class="mb-0">Statistiques</h6>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <small class="text-muted">Date de création:</small><br>
                        <strong>{{ $dish->created_at->format('d/m/Y H:i') }}</strong>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted">Dernière modification:</small><br>
                        <strong>{{ $dish->updated_at->format('d/m/Y H:i') }}</strong>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted">Slug:</small><br>
                        <strong>{{ $dish->slug }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image');
    const preview = document.querySelector('.card-body img');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                if (preview) {
                    preview.src = reader.result;
                }
            });

            reader.readAsDataURL(file);
        }
    });
});
</script>
@endpush
@endsection
