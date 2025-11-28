@extends('admin.layouts.app')

@section('title', 'Gestion des Réservations')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">Gestion des Réservations</h1>
                <a href="{{ route('admin.reservations.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Nouvelle Réservation
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Contact</th>
                            <th>Date/Heure</th>
                            <th>Personnes</th>
                            <th>Statut</th>
                            <th>Date création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $reservation)
                        <tr>
                            <td>
                                <strong>{{ $reservation->customer_name }}</strong>
                                @if($reservation->special_requests)
                                    <br><small class="text-muted">{{ Str::limit($reservation->special_requests, 30) }}</small>
                                @endif
                            </td>
                            <td>
                                <div>{{ $reservation->email }}</div>
                                <small class="text-muted">{{ $reservation->phone }}</small>
                            </td>
                            <td>
                                <div>{{ $reservation->reservation_date->format('d/m/Y') }}</div>
                                <small class="text-muted">{{ $reservation->reservation_time }}</small>
                            </td>
                            <td>{{ $reservation->guests_count }}</td>
                            <td>
                                <span class="badge bg-{{ $reservation->status === 'confirmed' ? 'success' : ($reservation->status === 'pending' ? 'warning' : 'danger') }}">
                                    {{ $reservation->status === 'confirmed' ? 'Confirmée' : ($reservation->status === 'pending' ? 'En attente' : 'Annulée') }}
                                </span>
                            </td>
                            <td>{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.reservations.show', $reservation) }}" class="btn btn-sm btn-outline-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.reservations.edit', $reservation) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.reservations.destroy', $reservation) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Aucune réservation trouvée</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
