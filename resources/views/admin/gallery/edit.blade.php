@extends('admin.layouts.app')

@section('title', 'Modifier l\'Image')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0">Modifier l'Image</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Titre *</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ old('title', $gallery->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description"
                                      rows="3">{{ old('description', $gallery->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image"
                                   accept="image/*">
                            <div class="form-text">
                                Laissez vide pour conserver l'image actuelle. Formats: JPEG, PNG, JPG, GIF. Max: 2MB
                            </div>

                            @if($gallery->image)
                            <div class="mt-2">
                                <label class="form-label">Image actuelle :</label>
                                <div>
                                    <img src="{{ asset('storage/' . $gallery->image) }}"
                                         alt="{{ $gallery->title }}"
                                         class="img-thumbnail"
                                         style="max-height: 200px;">
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_active"
                                               name="is_active" value="1"
                                               {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Image active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Ordre d'affichage</label>
                                    <input type="number" class="form-control" id="sort_order"
                                           name="sort_order" value="{{ old('sort_order', $gallery->sort_order) }}">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Retour</a>
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
                <div class="card-body text-center">
                    @if($gallery->image)
                        <img src="{{ asset('storage/' . $gallery->image) }}"
                             alt="{{ $gallery->title }}"
                             class="img-fluid rounded mb-3"
                             style="max-height: 200px; object-fit: cover;">
                        <p class="small text-muted mb-0">{{ $gallery->title }}</p>
                    @else
                        <div class="text-muted">
                            <i class="fas fa-image fa-3x mb-3"></i>
                            <p>Aucune image</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h6 class="mb-0">Informations</h6>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <small class="text-muted">Date de création:</small><br>
                        <strong>{{ $gallery->created_at->format('d/m/Y H:i') }}</strong>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted">Dernière modification:</small><br>
                        <strong>{{ $gallery->updated_at->format('d/m/Y H:i') }}</strong>
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
