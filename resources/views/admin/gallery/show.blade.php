@extends('admin.layouts.app')

@section('title', 'Détails de l\'Image')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">Détails de l'Image</h1>
                <div class="btn-group">
                    <a href="{{ route('admin.gallery.edit', $gallery) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Modifier
                    </a>
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
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
                    @if($gallery->image)
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $gallery->image) }}"
                                 alt="{{ $gallery->title }}"
                                 class="img-fluid rounded"
                                 style="max-height: 500px; object-fit: cover;">
                        </div>
                    @else
                        <div class="text-center text-muted py-5">
                            <i class="fas fa-image fa-4x mb-3"></i>
                            <p>Aucune image</p>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Titre</label>
                                <p class="mb-0">{{ $gallery->title }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Statut</label>
                                <p class="mb-0">
                                    <span class="badge bg-{{ $gallery->is_active ? 'success' : 'danger' }}">
                                        {{ $gallery->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    @if($gallery->description)
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <p class="mb-0">{{ $gallery->description }}</p>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Ordre d'affichage</label>
                                <p class="mb-0">{{ $gallery->sort_order }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Date de création</label>
                                <p class="mb-0">{{ $gallery->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.gallery.edit', $gallery) }}" class="btn btn-primary mb-2">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </a>

                        <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image ?')">
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
                    <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="is_active" value="{{ $gallery->is_active ? '0' : '1' }}">
                        <button type="submit" class="btn btn-{{ $gallery->is_active ? 'warning' : 'success' }} w-100">
                            <i class="fas fa-{{ $gallery->is_active ? 'eye-slash' : 'eye' }} me-2"></i>
                            {{ $gallery->is_active ? 'Désactiver' : 'Activer' }}
                        </button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informations techniques</h5>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <small class="text-muted">ID:</small><br>
                        <strong>#{{ $gallery->id }}</strong>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted">Dernière modification:</small><br>
                        <strong>{{ $gallery->updated_at->format('d/m/Y H:i') }}</strong>
                    </div>
                    @if($gallery->image)
                    <div class="mb-2">
                        <small class="text-muted">Chemin de l'image:</small><br>
                        <small class="text-muted">{{ $gallery->image }}</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
