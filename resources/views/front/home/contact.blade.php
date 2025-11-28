@extends('front.layouts.app')

@section('title', 'Contact - VinSmoke')
@section('description', 'Contactez VinSmoke restaurant à Lomé pour vos réservations et informations.')

@section('content')
<section class="section-padding">
    <div class="container">
        <h1 class="section-title mb-5">Nous Contacter</h1>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Envoyez-nous un message</h4>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nom complet</label>
                                        <input type="text" class="form-control" id="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Sujet</label>
                                <input type="text" class="form-control" id="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Envoyer le message</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informations de contact</h5>
                        <div class="mb-3">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>
                            <strong>Adresse :</strong><br>
                            Rue des Restaurants<br>
                            Lomé, Togo
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-phone text-primary me-2"></i>
                            <strong>Téléphone :</strong><br>
                            +228 XX XX XX XX
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            <strong>Email :</strong><br>
                            contact@vinsmoke.tg
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-clock text-primary me-2"></i>
                            <strong>Horaires :</strong><br>
                            Lun - Ven: 11h30 - 22h00<br>
                            Sam - Dim: 12h00 - 23h00
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
