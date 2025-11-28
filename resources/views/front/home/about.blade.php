@extends('front.layouts.app')

@section('title', 'À Propos - VinSmoke')
@section('description', 'Découvrez l\'histoire de VinSmoke, restaurant raffiné à Lomé.')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="section-title text-start mb-4">Notre Histoire</h1>
                <p class="lead">VinSmoke, une passion pour la gastronomie depuis 2010.</p>
                <p>Installé au cœur de Lomé, VinSmoke allie tradition culinaire et innovation pour vous offrir une expérience gastronomique unique.</p>
                <p>Notre équipe de chefs passionnés sélectionne les meilleurs produits locaux pour créer des plats qui racontent une histoire.</p>

                <div class="mt-4">
                    <h5>Nos Valeurs</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-primary me-2"></i>Produits frais et locaux</li>
                        <li><i class="fas fa-check text-primary me-2"></i>Service personnalisé</li>
                        <li><i class="fas fa-check text-primary me-2"></i>Ambiance élégante et chaleureuse</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                     alt="Notre restaurant" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>
@endsection
