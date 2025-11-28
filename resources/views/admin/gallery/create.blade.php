@extends('admin.layouts.app')

@section('title', 'Ajouter une Image')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0">Ajouter une Image</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Titre *</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description"
                                      rows="3">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image *</label>
                            <input type="file" class="form-control" id="image" name="image"
                                   accept="image/*" required>
                            <div class="form-text">
                                Formats acceptés: JPEG, PNG, JPG, GIF. Taille max: 2MB
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_active"
                                               name="is_active" value="1" checked>
                                        <label class="form-check-label" for="is_active">Image active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Ordre d'affichage</label>
                                    <input type="number" class="form-control" id="sort_order"
                                           name="sort_order" value="{{ old('sort_order', 0) }}">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Retour</a>
                            <button type="submit" class="btn btn-primary">Ajouter l'image</button>
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
                        <strong>Image :</strong> Utilisez des images de haute qualité qui représentent votre restaurant.
                    </p>
                    <p class="small text-muted mb-3">
                        <strong>Taille :</strong> Recommandé 1200x800 pixels pour un affichage optimal.
                    </p>
                    <p class="small text-muted">
                        <strong>Contenu :</strong> Photos de plats, ambiance du restaurant, événements spéciaux.
                    </p>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h6 class="mb-0">Aperçu</h6>
                </div>
                <div class="card-body text-center">
                    <div id="imagePreview" class="mb-3" style="display: none;">
                        <img id="preview" class="img-fluid rounded"
                             style="max-height: 200px; object-fit: cover;">
                    </div>
                    <p class="small text-muted mb-0" id="previewText">
                        Aperçu de l'image apparaîtra ici
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image');
    const preview = document.getElementById('preview');
    const imagePreview = document.getElementById('imagePreview');
    const previewText = document.getElementById('previewText');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                preview.src = reader.result;
                imagePreview.style.display = 'block';
                previewText.style.display = 'none';
            });

            reader.readAsDataURL(file);
        } else {
            imagePreview.style.display = 'none';
            previewText.style.display = 'block';
        }
    });
});
</script>
@endpush
@endsection
