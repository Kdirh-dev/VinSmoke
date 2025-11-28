@extends('admin.layouts.app')

@section('title', 'Tableau de Bord')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0">Tableau de Bord</h1>
            <p class="text-muted">Aperçu général de votre restaurant</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-muted">Total Plats</h6>
                        <h2 class="stat-number">{{ $stats['totalDishes'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-utensils fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-muted">Catégories</h6>
                        <h2 class="stat-number">{{ $stats['totalCategories'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-tags fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-muted">Réservations en attente</h6>
                        <h2 class="stat-number">{{ $stats['pendingReservations'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-clock fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-muted">Total Réservations</h6>
                        <h2 class="stat-number">{{ $stats['totalReservations'] }}</h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-calendar-check fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Reservations -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-clock me-2"></i>Réservations Récentes
                    </h5>
                </div>
                <div class="card-body">
                    @if($recentReservations->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Date</th>
                                        <th>Personnes</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentReservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->customer_name }}</td>
                                        <td>{{ $reservation->reservation_date->format('d/m/Y') }}</td>
                                        <td>{{ $reservation->guests_count }}</td>
                                        <td>
                                            <span class="badge bg-{{ $reservation->status === 'confirmed' ? 'success' : ($reservation->status === 'pending' ? 'warning' : 'danger') }}">
                                                {{ $reservation->status === 'confirmed' ? 'Confirmée' : ($reservation->status === 'pending' ? 'En attente' : 'Annulée') }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted text-center">Aucune réservation récente</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Popular Dishes -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-star me-2"></i>Plats en Vedette
                        </h5>
                    </div>
                    <div class="card-body">
                        @if($popularDishes->count() > 0)
                            <div class="list-group list-group-flush">
                                @foreach($popularDishes as $dish)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">{{ $dish->name }}</h6>
                                        <small class="text-muted">{{ $dish->category->name }}</small>
                                    </div>
                                    <span class="badge bg-warning rounded-pill">Vedette</span>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted text-center">Aucun plat en vedette</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
