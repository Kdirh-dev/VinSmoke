@extends('admin.layouts.app')

@section('title', 'Nouveau Plat')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0">Nouveau Plat</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du plat *</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Prix (FCFA) *</label>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Catégorie *</label>
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value="">Sélectionnez une catégorie</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                            <div class="form-text">Format: JPEG, PNG, JPG, GIF. Max: 2MB</div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_available" name="is_available" value="1" checked>
                                        <label class="form-check-label" for="is_available">Disponible</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1">
                                        <label class="form-check-label" for="is_featured">En vedette</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Ordre d'affichage</label>
                                    <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.dishes.index') }}" class="btn btn-secondary">Retour</a>
                            <button type="submit" class="btn btn-primary">Créer le plat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Conseils</h6>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-3">
                        <strong>Nom :</strong> Soyez descriptif et attractif.
                    </p>
                    <p class="small text-muted mb-3">
                        <strong>Description :</strong> Décrivez les ingrédients et la préparation.
                    </p>
                    <p class="small text-muted">
                        <strong>Image :</strong> Une photo appétissante augmente les ventes.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
