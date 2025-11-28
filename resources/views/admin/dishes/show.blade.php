@extends('admin.layouts.app')

@section('title', 'Détails du Plat')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">Détails du Plat</h1>
                <div class="btn-group">
                    <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Modifier
                    </a>
                    <a href="{{ route('admin.dishes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Retour
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($dish->image)
                                <img src="{{ asset('storage/' . $dish->image) }}"
                                     alt="{{ $dish->name }}"
                                     class="img-fluid rounded shadow"
                                     style="max-height: 300px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                     style="height: 300px;">
                                    <i class="fas fa-utensils fa-3x text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nom du plat</label>
                                <h4 class="text-primary">{{ $dish->name }}</h4>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Prix</label>
                                        <p class="h5 text-success">{{ $dish->formatted_price }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Catégorie</label>
                                        <p class="mb-0">
                                            <span class="badge bg-secondary">{{ $dish->category->name }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Statut</label>
                                        <p class="mb-0">
                                            <span class="badge bg-{{ $dish->is_available ? 'success' : 'danger' }}">
                                                {{ $dish->is_available ? 'Disponible' : 'Indisponible' }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">En vedette</label>
                                        <p class="mb-0">
                                            <span class="badge bg-{{ $dish->is_featured ? 'warning' : 'secondary' }}">
                                                {{ $dish->is_featured ? 'Oui' : 'Non' }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Ordre d'affichage</label>
                                <p class="mb-0">{{ $dish->sort_order }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="form-label fw-bold">Description</label>
                        <p class="mb-0">{{ $dish->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Actions Rapides</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-primary mb-2">
                            <i class="fas fa-edit me-2"></i>Modifier le plat
                        </a>

                        <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce plat ?')">
                                <i class="fas fa-trash me-2"></i>Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Statut</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <form action="{{ route('admin.dishes.update', $dish) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_available" value="{{ $dish->is_available ? '0' : '1' }}">
                            <button type="submit" class="btn btn-{{ $dish->is_available ? 'warning' : 'success' }} w-100 mb-2">
                                <i class="fas fa-{{ $dish->is_available ? 'times' : 'check' }} me-2"></i>
                                {{ $dish->is_available ? 'Rendre Indisponible' : 'Rendre Disponible' }}
                            </button>
                        </form>

                        <form action="{{ route('admin.dishes.update', $dish) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_featured" value="{{ $dish->is_featured ? '0' : '1' }}">
                            <button type="submit" class="btn btn-{{ $dish->is_featured ? 'secondary' : 'warning' }} w-100">
                                <i class="fas fa-{{ $dish->is_featured ? 'star' : 'star' }} me-2"></i>
                                {{ $dish->is_featured ? 'Retirer des vedettes' : 'Mettre en vedette' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informations</h5>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <small class="text-muted">ID:</small><br>
                        <strong>#{{ $dish->id }}</strong>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted">Slug:</small><br>
                        <strong>{{ $dish->slug }}</strong>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted">Date de création:</small><br>
                        <strong>{{ $dish->created_at->format('d/m/Y H:i') }}</strong>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted">Dernière modification:</small><br>
                        <strong>{{ $dish->updated_at->format('d/m/Y H:i') }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
