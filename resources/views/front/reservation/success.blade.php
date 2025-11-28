@extends('front.layouts.app')

@section('title', 'Réservation Confirmée - VinSmoke')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow text-center">
                    <div class="card-body py-5">
                        <div class="text-success mb-4">
                            <i class="fas fa-check-circle fa-5x"></i>
                        </div>
                        <h1 class="h2 mb-3">Réservation Confirmée !</h1>
                        <p class="lead mb-4">Merci pour votre réservation. Nous vous avons envoyé un email de confirmation.</p>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="mb-4">
                            <p class="text-muted">Nous vous contacterons dans les plus brefs délais pour finaliser les détails.</p>
                        </div>

                        <div class="d-flex gap-3 justify-content-center">
                            <a href="{{ route('home') }}" class="btn btn-primary">
                                <i class="fas fa-home me-2"></i>Retour à l'accueil
                            </a>
                            <a href="{{ route('menu') }}" class="btn btn-outline-primary">
                                <i class="fas fa-utensils me-2"></i>Voir le menu
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
