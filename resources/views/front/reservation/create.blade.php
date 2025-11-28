@extends('front.layouts.app')

@section('title', 'Réservation - VinSmoke')
@section('description', 'Réservez votre table chez VinSmoke restaurant à Lomé.')

@section('content')
<section class="section-padding bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="text-center mb-4">Réserver une table</h1>
                        <p class="text-center text-muted mb-4">Réservez votre expérience culinaire chez VinSmoke</p>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('reservation.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="customer_name" class="form-label">Nom complet *</label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name"
                                               value="{{ old('customer_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{ old('email') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Téléphone *</label>
                                        <input type="tel" class="form-control" id="phone" name="phone"
                                               value="{{ old('phone') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="guests_count" class="form-label">Nombre de personnes *</label>
                                        <select class="form-select" id="guests_count" name="guests_count" required>
                                            <option value="">Sélectionnez...</option>
                                            @for($i = 1; $i <= 20; $i++)
                                                <option value="{{ $i }}" {{ old('guests_count') == $i ? 'selected' : '' }}>
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
                                               min="{{ date('Y-m-d') }}" value="{{ old('reservation_date') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="reservation_time" class="form-label">Heure *</label>
                                        <select class="form-select" id="reservation_time" name="reservation_time" required>
                                            <option value="">Sélectionnez...</option>
                                            <option value="12:00" {{ old('reservation_time') == '12:00' ? 'selected' : '' }}>12:00</option>
                                            <option value="12:30" {{ old('reservation_time') == '12:30' ? 'selected' : '' }}>12:30</option>
                                            <option value="13:00" {{ old('reservation_time') == '13:00' ? 'selected' : '' }}>13:00</option>
                                            <option value="13:30" {{ old('reservation_time') == '13:30' ? 'selected' : '' }}>13:30</option>
                                            <option value="19:00" {{ old('reservation_time') == '19:00' ? 'selected' : '' }}>19:00</option>
                                            <option value="19:30" {{ old('reservation_time') == '19:30' ? 'selected' : '' }}>19:30</option>
                                            <option value="20:00" {{ old('reservation_time') == '20:00' ? 'selected' : '' }}>20:00</option>
                                            <option value="20:30" {{ old('reservation_time') == '20:30' ? 'selected' : '' }}>20:30</option>
                                            <option value="21:00" {{ old('reservation_time') == '21:00' ? 'selected' : '' }}>21:00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="special_requests" class="form-label">Demandes spéciales</label>
                                <textarea class="form-control" id="special_requests" name="special_requests"
                                          rows="4" placeholder="Allergies, anniversaire, etc.">{{ old('special_requests') }}</textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Confirmer la réservation</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('reservation_date');
    const today = new Date().toISOString().split('T')[0];
    dateInput.min = today;
});
</script>
@endpush
