@extends('admin.layouts.app')

@section('title', 'Modifier la Réservation')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0">Modifier la Réservation</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.reservations.update', $reservation) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_name" class="form-label">Nom du client *</label>
                                    <input type="text" class="form-control" id="customer_name" name="customer_name"
                                           value="{{ old('customer_name', $reservation->customer_name) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="{{ old('email', $reservation->email) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Téléphone *</label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                           value="{{ old('phone', $reservation->phone) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="guests_count" class="form-label">Nombre de personnes *</label>
                                    <select class="form-select" id="guests_count" name="guests_count" required>
                                        <option value="">Sélectionnez...</option>
                                        @for($i = 1; $i <= 20; $i++)
                                            <option value="{{ $i }}" {{ old('guests_count', $reservation->guests_count) == $i ? 'selected' : '' }}>
                                                {{ $i }} personne{{ $i > 1 ? 's' : '' }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="reservation_date" class="form-label">Date de réservation *</label>
                                    <input type="date" class="form-control" id="reservation_date" name="reservation_date"
                                           value="{{ old('reservation_date', $reservation->reservation_date->format('Y-m-d')) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="reservation_time" class="form-label">Heure *</label>
                                    <select class="form-select" id="reservation_time" name="reservation_time" required>
                                        <option value="">Sélectionnez...</option>
                                        <option value="12:00" {{ old('reservation_time', $reservation->reservation_time) == '12:00' ? 'selected' : '' }}>12:00</option>
                                        <option value="12:30" {{ old('reservation_time', $reservation->reservation_time) == '12:30' ? 'selected' : '' }}>12:30</option>
                                        <option value="13:00" {{ old('reservation_time', $reservation->reservation_time) == '13:00' ? 'selected' : '' }}>13:00</option>
                                        <option value="13:30" {{ old('reservation_time', $reservation->reservation_time) == '13:30' ? 'selected' : '' }}>13:30</option>
                                        <option value="19:00" {{ old('reservation_time', $reservation->reservation_time) == '19:00' ? 'selected' : '' }}>19:00</option>
                                        <option value="19:30" {{ old('reservation_time', $reservation->reservation_time) == '19:30' ? 'selected' : '' }}>19:30</option>
                                        <option value="20:00" {{ old('reservation_time', $reservation->reservation_time) == '20:00' ? 'selected' : '' }}>20:00</option>
                                        <option value="20:30" {{ old('reservation_time', $reservation->reservation_time) == '20:30' ? 'selected' : '' }}>20:30</option>
                                        <option value="21:00" {{ old('reservation_time', $reservation->reservation_time) == '21:00' ? 'selected' : '' }}>21:00</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Statut *</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="pending" {{ old('status', $reservation->status) == 'pending' ? 'selected' : '' }}>En attente</option>
                                <option value="confirmed" {{ old('status', $reservation->status) == 'confirmed' ? 'selected' : '' }}>Confirmée</option>
                                <option value="cancelled" {{ old('status', $reservation->status) == 'cancelled' ? 'selected' : '' }}>Annulée</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="special_requests" class="form-label">Demandes spéciales</label>
                            <textarea class="form-control" id="special_requests" name="special_requests"
                                      rows="4" placeholder="Allergies, anniversaire, etc.">{{ old('special_requests', $reservation->special_requests) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.reservations.index') }}" class="btn btn-secondary">Retour</a>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Informations</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Date de création:</strong><br>
                        {{ $reservation->created_at->format('d/m/Y H:i') }}
                    </div>
                    <div class="mb-3">
                        <strong>Dernière modification:</strong><br>
                        {{ $reservation->updated_at->format('d/m/Y H:i') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
