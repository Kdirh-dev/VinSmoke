@extends('admin.layouts.app')

@section('title', 'Tableau de Bord')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5" data-aos="fade-down">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-2 text-light">Tableau de Bord</h1>
                    <p class="text-muted mb-0">Aperçu général de votre restaurant</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-gold">
                        <i class="fas fa-sync-alt me-2"></i>Actualiser
                    </button>
                    <button class="btn btn-gold">
                        <i class="fas fa-download me-2"></i>Exporter
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-5" data-aos="fade-up">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">TOTAL PLATS</h6>
                        <h2 class="stat-number">{{ $stats['totalDishes'] }}</h2>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>12% ce mois
                        </small>
                    </div>
                    <div class="icon-wrapper">
                        <i class="fas fa-utensils"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">CATÉGORIES</h6>
                        <h2 class="stat-number">{{ $stats['totalCategories'] }}</h2>
                        <small class="text-info">
                            <i class="fas fa-tag me-1"></i>Toutes actives
                        </small>
                    </div>
                    <div class="icon-wrapper">
                        <i class="fas fa-tags"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">RÉSERVATIONS EN ATTENTE</h6>
                        <h2 class="stat-number">{{ $stats['pendingReservations'] }}</h2>
                        <small class="text-warning">
                            <i class="fas fa-clock me-1"></i>À traiter
                        </small>
                    </div>
                    <div class="icon-wrapper">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">TOTAL RÉSERVATIONS</h6>
                        <h2 class="stat-number">{{ $stats['totalReservations'] }}</h2>
                        <small class="text-success">
                            <i class="fas fa-chart-line me-1"></i>+8% ce mois
                        </small>
                    </div>
                    <div class="icon-wrapper">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Reservations -->
        <div class="col-lg-8 mb-4">
            <div class="admin-card h-100" data-aos="fade-right">
                <div class="card-header border-0 bg-transparent">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 text-light">
                            <i class="fas fa-clock me-2 text-warning"></i>Réservations Récentes
                        </h5>
                        <a href="{{ route('admin.reservations.index') }}" class="btn btn-outline-gold btn-sm">
                            Voir tout
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($recentReservations->count() > 0)
                        <div class="table-responsive">
                            <table class="table admin-table table-hover">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Date</th>
                                        <th>Personnes</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentReservations as $reservation)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-3">
                                                    <div class="avatar-placeholder bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                                         style="width: 32px; height: 32px;">
                                                        <i class="fas fa-user text-light"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <strong>{{ $reservation->customer_name }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ $reservation->email }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-nowrap">
                                                <strong>{{ $reservation->reservation_date->format('d/m/Y') }}</strong>
                                                <br>
                                                <small class="text-muted">{{ $reservation->reservation_time }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-dark rounded-pill">
                                                {{ $reservation->guests_count }} pers.
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $reservation->status === 'confirmed' ? 'success' : ($reservation->status === 'pending' ? 'warning' : 'danger') }} rounded-pill">
                                                {{ $reservation->status === 'confirmed' ? 'Confirmée' : ($reservation->status === 'pending' ? 'En attente' : 'Annulée') }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.reservations.show', $reservation) }}"
                                                   class="btn btn-outline-light btn-sm"
                                                   title="Voir">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.reservations.edit', $reservation) }}"
                                                   class="btn btn-outline-gold btn-sm"
                                                   title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Aucune réservation récente</h5>
                            <p class="text-muted mb-0">Les nouvelles réservations apparaîtront ici.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Popular Dishes & Quick Actions -->
        <div class="col-lg-4">
            <!-- Popular Dishes -->
            <div class="admin-card mb-4" data-aos="fade-left" data-aos-delay="100">
                <div class="card-header border-0 bg-transparent">
                    <h5 class="card-title mb-0 text-light">
                        <i class="fas fa-star me-2 text-warning"></i>Plats en Vedette
                    </h5>
                </div>
                <div class="card-body">
                    @if($popularDishes->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($popularDishes as $dish)
                            <div class="list-group-item bg-transparent border-light d-flex justify-content-between align-items-center px-0">
                                <div class="d-flex align-items-center">
                                    <div class="dish-thumb me-3">
                                        @if($dish->image)
                                            <img src="{{ asset('storage/' . $dish->image) }}"
                                                 alt="{{ $dish->name }}"
                                                 class="rounded"
                                                 style="width: 40px; height: 40px; object-fit: cover;">
                                        @else
                                            <div class="bg-dark rounded d-flex align-items-center justify-content-center"
                                                 style="width: 40px; height: 40px;">
                                                <i class="fas fa-utensils text-muted"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-light">{{ $dish->name }}</h6>
                                        <small class="text-muted">{{ $dish->category->name }}</small>
                                    </div>
                                </div>
                                <span class="badge bg-gold text-dark">
                                    {{ $dish->formatted_price }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-utensils fa-2x text-muted mb-2"></i>
                            <p class="text-muted mb-0">Aucun plat en vedette</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="admin-card" data-aos="fade-left" data-aos-delay="200">
                <div class="card-header border-0 bg-transparent">
                    <h5 class="card-title mb-0 text-light">
                        <i class="fas fa-bolt me-2 text-warning"></i>Actions Rapides
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.dishes.create') }}" class="btn btn-gold">
                            <i class="fas fa-plus me-2"></i>Nouveau Plat
                        </a>
                        <a href="{{ route('admin.reservations.create') }}" class="btn btn-outline-gold">
                            <i class="fas fa-calendar-plus me-2"></i>Nouvelle Réservation
                        </a>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-gold">
                            <i class="fas fa-folder-plus me-2"></i>Nouvelle Catégorie
                        </a>
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-outline-gold">
                            <i class="fas fa-image me-2"></i>Nouvelle Image
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="admin-card" data-aos="fade-up">
                <div class="card-header border-0 bg-transparent">
                    <h5 class="card-title mb-0 text-light">
                        <i class="fas fa-history me-2 text-warning"></i>Activité Récente
                    </h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <span class="text-light">Nouvelle réservation de Jean Dupont</span>
                                    <small class="text-muted">Il y a 5 min</small>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <span class="text-light">Plat "Filet de Boeuf" modifié</span>
                                    <small class="text-muted">Il y a 1 heure</small>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <span class="text-light">Nouvelle image ajoutée à la galerie</span>
                                    <small class="text-muted">Il y a 2 heures</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.icon-wrapper {
    width: 50px;
    height: 50px;
    background: rgba(200, 169, 126, 0.1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-gold);
    font-size: 1.5rem;
}

.dish-thumb {
    flex-shrink: 0;
}

.timeline {
    position: relative;
    padding-left: 2rem;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 0.75rem;
    top: 0;
    bottom: 0;
    width: 2px;
    background: var(--border-light);
}

.timeline-item {
    position: relative;
    margin-bottom: 1.5rem;
}

.timeline-marker {
    position: absolute;
    left: -2rem;
    top: 0.25rem;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid var(--primary-dark);
}

.timeline-content {
    padding-left: 1rem;
}

.avatar-sm {
    flex-shrink: 0;
}

.bg-gold {
    background: var(--accent-gold) !important;
}

.table-hover tbody tr:hover {
    background: rgba(200, 169, 126, 0.05) !important;
}
</style>
@endpush
