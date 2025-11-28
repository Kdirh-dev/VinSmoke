@extends('admin.layouts.app')

@section('title', 'Gestion des Réservations')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5" data-aos="fade-down">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-2 text-light">Gestion des Réservations</h1>
                    <p class="text-muted mb-0">Gérez les réservations de votre restaurant</p>
                </div>
                <a href="{{ route('admin.reservations.create') }}" class="btn btn-gold">
                    <i class="fas fa-plus me-2"></i>Nouvelle Réservation
                </a>
            </div>
        </div>
    </div>

    <!-- Stats & Filters -->
    <div class="row mb-4">
        <!-- Quick Stats -->
        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
            <div class="admin-card text-center">
                <div class="card-body">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-clock fa-2x text-warning"></i>
                    </div>
                    <h3 class="stat-number">{{ $reservations->where('status', 'pending')->count() }}</h3>
                    <p class="text-muted mb-0">En attente</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="admin-card text-center">
                <div class="card-body">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-check-circle fa-2x text-success"></i>
                    </div>
                    <h3 class="stat-number">{{ $reservations->where('status', 'confirmed')->count() }}</h3>
                    <p class="text-muted mb-0">Confirmées</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="admin-card text-center">
                <div class="card-body">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-times-circle fa-2x text-danger"></i>
                    </div>
                    <h3 class="stat-number">{{ $reservations->where('status', 'cancelled')->count() }}</h3>
                    <p class="text-muted mb-0">Annulées</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="admin-card text-center">
                <div class="card-body">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                    <h3 class="stat-number">{{ $reservations->sum('guests_count') }}</h3>
                    <p class="text-muted mb-0">Couverts totaux</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Reservations Table -->
    <div class="row">
        <div class="col-12" data-aos="fade-up">
            <div class="admin-card">
                <div class="card-header border-0 bg-transparent">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 text-light">
                            <i class="fas fa-list me-2 text-gold"></i>Toutes les Réservations
                        </h5>
                        <div class="d-flex gap-2">
                            <select class="form-select bg-dark border-light text-light" style="width: auto;">
                                <option value="all">Tous les statuts</option>
                                <option value="pending">En attente</option>
                                <option value="confirmed">Confirmées</option>
                                <option value="cancelled">Annulées</option>
                            </select>
                            <input type="date" class="form-control bg-dark border-light text-light" style="width: auto;">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($reservations->count() > 0)
                        <div class="table-responsive">
                            <table class="table admin-table table-hover">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Contact</th>
                                        <th>Date/Heure</th>
                                        <th>Personnes</th>
                                        <th>Statut</th>
                                        <th>Création</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservations as $reservation)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-3">
                                                    <div class="avatar-placeholder bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                                         style="width: 40px; height: 40px;">
                                                        <i class="fas fa-user text-light"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <strong class="text-light">{{ $reservation->customer_name }}</strong>
                                                    @if($reservation->special_requests)
                                                        <br>
                                                        <small class="text-muted">{{ Str::limit($reservation->special_requests, 30) }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <div class="text-light">{{ $reservation->email }}</div>
                                                <small class="text-muted">{{ $reservation->phone }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-nowrap">
                                                <strong class="text-light">{{ $reservation->reservation_date->format('d/m/Y') }}</strong>
                                                <br>
                                                <small class="text-muted">{{ $reservation->reservation_time }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-dark rounded-pill fs-6">
                                                {{ $reservation->guests_count }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $reservation->status === 'confirmed' ? 'success' : ($reservation->status === 'pending' ? 'warning' : 'danger') }} rounded-pill">
                                                {{ $reservation->status === 'confirmed' ? 'Confirmée' : ($reservation->status === 'pending' ? 'En attente' : 'Annulée') }}
                                            </span>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                {{ $reservation->created_at->format('d/m/Y H:i') }}
                                            </small>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.reservations.show', $reservation) }}"
                                                   class="btn btn-outline-light btn-sm"
                                                   title="Voir détails">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.reservations.edit', $reservation) }}"
                                                   class="btn btn-outline-gold btn-sm"
                                                   title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.reservations.destroy', $reservation) }}"
                                                      method="POST"
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-outline-danger btn-sm"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')"
                                                            title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-calendar-times fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">Aucune réservation</h4>
                            <p class="text-muted mb-4">Les réservations apparaîtront ici.</p>
                            <a href="{{ route('admin.reservations.create') }}" class="btn btn-gold">
                                <i class="fas fa-plus me-2"></i>Créer une Réservation
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.stat-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.avatar-sm .avatar-placeholder {
    width: 40px;
    height: 40px;
    font-size: 1rem;
}

.table td {
    vertical-align: middle;
}

.btn-group .btn {
    border-radius: 6px;
    margin: 0 2px;
}

.badge.fs-6 {
    font-size: 1rem;
    padding: 0.5rem 0.75rem;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const statusFilter = document.querySelector('select');
    const dateFilter = document.querySelector('input[type="date"]');

    function filterReservations() {
        const status = statusFilter.value;
        const date = dateFilter.value;
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            let show = true;
            const statusBadge = row.querySelector('.badge');
            const dateCell = row.querySelector('td:nth-child(3) strong');

            // Status filter
            if (status !== 'all') {
                const statusText = statusBadge.textContent.trim().toLowerCase();
                const statusMap = {
                    'pending': 'en attente',
                    'confirmed': 'confirmée',
                    'cancelled': 'annulée'
                };

                if (statusText !== statusMap[status]) {
                    show = false;
                }
            }

            // Date filter
            if (date) {
                const rowDate = dateCell.textContent.trim();
                const [day, month, year] = rowDate.split('/');
                const formattedRowDate = `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`;

                if (formattedRowDate !== date) {
                    show = false;
                }
            }

            row.style.display = show ? '' : 'none';
        });
    }

    statusFilter.addEventListener('change', filterReservations);
    dateFilter.addEventListener('change', filterReservations);

    // Quick status actions
    const statusBadges = document.querySelectorAll('.badge.bg-warning, .badge.bg-success');
    statusBadges.forEach(badge => {
        badge.style.cursor = 'pointer';
        badge.addEventListener('click', function() {
            const reservationId = this.closest('tr').dataset.reservationId;
            const currentStatus = this.classList.contains('bg-warning') ? 'pending' :
                                this.classList.contains('bg-success') ? 'confirmed' : 'cancelled';

            // Toggle status logic would go here
            console.log(`Toggle status for reservation ${reservationId}`);
        });
    });
});
</script>
@endpush
