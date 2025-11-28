@extends('admin.layouts.app')

@section('title', 'Gestion de la Galerie')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">Gestion de la Galerie</h1>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Nouvelle Image
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse($images as $image)
        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top" alt="{{ $image->title }}"
                     style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h6 class="card-title">{{ $image->title }}</h6>
                    @if($image->description)
                        <p class="card-text small text-muted">{{ Str::limit($image->description, 50) }}</p>
                    @endif
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-{{ $image->is_active ? 'success' : 'danger' }}">
                            {{ $image->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        <div class="btn-group">
                            <a href="{{ route('admin.gallery.edit', $image) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Aucune image dans la galerie</h5>
                <p class="text-muted">Commencez par ajouter des images pour présenter votre restaurant.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
