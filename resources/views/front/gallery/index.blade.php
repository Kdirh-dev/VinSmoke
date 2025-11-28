@extends('front.layouts.app')

@section('title', 'Galerie - VinSmoke')
@section('description', 'Découvrez l\'ambiance et les spécialités de VinSmoke restaurant à travers notre galerie photos.')

@section('content')
<section class="section-padding">
    <div class="container">
        <h1 class="section-title">Notre Galerie</h1>
        <p class="text-center lead mb-5">Découvrez l'ambiance unique de VinSmoke et nos créations culinaires</p>

        <div class="row">
            @forelse($images as $image)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="gallery-card position-relative overflow-hidden rounded shadow">
                    <img src="{{ asset('storage/' . $image->image) }}"
                         class="img-fluid w-100"
                         alt="{{ $image->title }}"
                         style="height: 300px; object-fit: cover;">
                    <div class="gallery-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                        <div class="text-center text-white">
                            <h5 class="mb-2">{{ $image->title }}</h5>
                            @if($image->description)
                                <p class="mb-0 small">{{ $image->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Galerie en cours de préparation</h4>
                <p class="text-muted">Notre galerie photos sera bientôt disponible.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.gallery-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.gallery-card:hover {
    transform: translateY(-5px);
}

.gallery-overlay {
    background: rgba(0, 0, 0, 0.7);
    opacity: 0;
    transition: all 0.3s ease;
    padding: 20px;
}

.gallery-card:hover .gallery-overlay {
    opacity: 1;
}
</style>
@endpush
