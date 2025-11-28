@extends('front.layouts.app')

@section('title', 'Menu - VinSmoke')
@section('description', 'Découvrez notre carte gastronomique : entrées, plats principaux, desserts et boissons sélectionnés avec soin.')

@section('content')
<section class="section-padding">
    <div class="container">
        <h1 class="section-title">Notre Carte</h1>
        <p class="text-center lead mb-5">Une sélection de plats préparés avec des ingrédients frais et locaux</p>

        @foreach($categories as $category)
        <div class="category-section mb-5" id="category-{{ $category->id }}">
            <h2 class="h3 mb-4 text-primary">{{ $category->name }}</h2>
            <p class="text-muted mb-4">{{ $category->description }}</p>

            <div class="row">
                @foreach($category->activeDishes as $dish)
                <div class="col-lg-6 mb-4">
                    <div class="dish-item card border-0 shadow-sm h-100">
                        <div class="row g-0 h-100">
                            <div class="col-md-4">
                                @if($dish->image)
                                    <img src="{{ asset('storage/' . $dish->image) }}"
                                         class="img-fluid rounded-start h-100 w-100"
                                         alt="{{ $dish->name }}"
                                         style="object-fit: cover;">
                                @else
                                    <div class="h-100 d-flex align-items-center justify-content-center bg-light">
                                        <i class="fas fa-utensils fa-2x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column h-100">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h5 class="card-title mb-0">{{ $dish->name }}</h5>
                                            @if($dish->is_featured)
                                                <span class="badge bg-warning">En vedette</span>
                                            @endif
                                        </div>
                                        <p class="card-text text-muted small">{{ $dish->description }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <span class="h5 text-primary mb-0">{{ $dish->formatted_price }}</span>
                                        <a href="{{ route('menu.show', $dish->slug) }}" class="btn btn-outline-primary btn-sm">
                                            Voir détails
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        @if(!$loop->last)
            <hr class="my-5">
        @endif
        @endforeach
    </div>
</section>
@endsection

@push('styles')
<style>
.dish-item {
    transition: all 0.3s ease;
}

.dish-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
}

.category-section {
    scroll-margin-top: 100px;
}
</style>
@endpush
