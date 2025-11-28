@extends('front.layouts.app')

@section('title', $dish->name . ' - VinSmoke')
@section('description', $dish->description)

@section('content')
<section class="section-padding">
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('menu') }}">Menu</a></li>
                <li class="breadcrumb-item active">{{ $dish->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-6 mb-4">
                @if($dish->image)
                    <img src="{{ asset('storage/' . $dish->image) }}"
                         class="img-fluid rounded shadow"
                         alt="{{ $dish->name }}">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                        <i class="fas fa-utensils fa-4x text-muted"></i>
                    </div>
                @endif
            </div>

            <div class="col-lg-6">
                <div class="ps-lg-4">
                    @if($dish->is_featured)
                        <span class="badge bg-warning mb-2">Plat en vedette</span>
                    @endif
                    <h1 class="h2 mb-3">{{ $dish->name }}</h1>
                    <p class="text-muted mb-4">{{ $dish->description }}</p>

                    <div class="mb-4">
                        <h4 class="text-primary">{{ $dish->formatted_price }}</h4>
                        <small class="text-muted">Prix TTC</small>
                    </div>

                    <div class="mb-4">
                        <h5>Catégorie</h5>
                        <span class="badge bg-secondary">{{ $dish->category->name }}</span>
                    </div>

                    <div class="d-flex gap-3 mb-5">
                        <a href="{{ route('reservation.create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-calendar-check me-2"></i>Réserver une table
                        </a>
                        <a href="{{ route('menu') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>Retour au menu
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if($relatedDishes->count() > 0)
        <div class="mt-5 pt-5 border-top">
            <h3 class="mb-4">Vous aimerez aussi</h3>
            <div class="row">
                @foreach($relatedDishes as $relatedDish)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100 dish-card">
                        @if($relatedDish->image)
                            <img src="{{ asset('storage/' . $relatedDish->image) }}"
                                 class="card-img-top"
                                 alt="{{ $relatedDish->name }}"
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-utensils fa-2x text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h6 class="card-title">{{ $relatedDish->name }}</h6>
                            <p class="card-text text-muted small">{{ Str::limit($relatedDish->description, 60) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-primary fw-bold">{{ $relatedDish->formatted_price }}</span>
                                <a href="{{ route('menu.show', $relatedDish->slug) }}" class="btn btn-sm btn-outline-primary">
                                    Voir
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
