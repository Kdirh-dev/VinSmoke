<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-playfair font-bold text-primary-dark">
                    Tableau de Bord
                </h1>
                <p class="text-gray-600 mt-2">Bienvenue, {{ Auth::user()->name }} !</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('reservation.create') }}" class="btn-reservation inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Nouvelle Réservation
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Reservations Card -->
                <div class="stats-card group">
                    <div class="stats-icon bg-blue-100 text-blue-600">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stats-content">
                        <p class="stats-label">Réservations</p>
                        <p class="stats-value">12</p>
                        <p class="stats-change positive">
                            <i class="fas fa-arrow-up mr-1"></i>
                            3 cette semaine
                        </p>
                    </div>
                </div>

                <!-- Orders Card -->
                <div class="stats-card group">
                    <div class="stats-icon bg-green-100 text-green-600">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div class="stats-content">
                        <p class="stats-label">Commandes</p>
                        <p class="stats-value">24</p>
                        <p class="stats-change positive">
                            <i class="fas fa-arrow-up mr-1"></i>
                            8 ce mois
                        </p>
                    </div>
                </div>

                <!-- Favorites Card -->
                <div class="stats-card group">
                    <div class="stats-icon bg-amber-100 text-amber-600">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="stats-content">
                        <p class="stats-label">Favoris</p>
                        <p class="stats-value">7</p>
                        <p class="stats-change">
                            Plats préférés
                        </p>
                    </div>
                </div>

                <!-- Reviews Card -->
                <div class="stats-card group">
                    <div class="stats-icon bg-purple-100 text-purple-600">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stats-content">
                        <p class="stats-label">Avis</p>
                        <p class="stats-value">4.8</p>
                        <p class="stats-change">
                            <i class="fas fa-star text-amber-400 mr-1"></i>
                            Note moyenne
                        </p>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Recent Reservations -->
                <div class="lg:col-span-2">
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            <h3 class="dashboard-card-title">
                                <i class="fas fa-history mr-3 text-accent-gold"></i>
                                Réservations Récentes
                            </h3>
                            <a href="{{ route('reservations.index') }}" class="text-accent-gold hover:text-accent-gold-dark font-semibold text-sm">
                                Voir tout
                            </a>
                        </div>
                        <div class="dashboard-card-content">
                            <div class="space-y-4">
                                <!-- Reservation 1 -->
                                <div class="reservation-item">
                                    <div class="reservation-info">
                                        <div class="reservation-date">
                                            <span class="date-day">15</span>
                                            <span class="date-month">DÉC</span>
                                        </div>
                                        <div class="reservation-details">
                                            <h4 class="reservation-title">Dîner Romantique</h4>
                                            <p class="reservation-meta">
                                                <i class="fas fa-clock mr-1"></i>20:00 •
                                                <i class="fas fa-users mr-1 ml-2"></i>2 personnes
                                            </p>
                                        </div>
                                    </div>
                                    <div class="reservation-status confirmed">
                                        <i class="fas fa-check-circle mr-2"></i>
                                        Confirmée
                                    </div>
                                </div>

                                <!-- Reservation 2 -->
                                <div class="reservation-item">
                                    <div class="reservation-info">
                                        <div class="reservation-date">
                                            <span class="date-day">18</span>
                                            <span class="date-month">DÉC</span>
                                        </div>
                                        <div class="reservation-details">
                                            <h4 class="reservation-title">Anniversaire</h4>
                                            <p class="reservation-meta">
                                                <i class="fas fa-clock mr-1"></i>19:30 •
                                                <i class="fas fa-users mr-1 ml-2"></i>6 personnes
                                            </p>
                                        </div>
                                    </div>
                                    <div class="reservation-status pending">
                                        <i class="fas fa-clock mr-2"></i>
                                        En attente
                                    </div>
                                </div>

                                <!-- Reservation 3 -->
                                <div class="reservation-item">
                                    <div class="reservation-info">
                                        <div class="reservation-date upcoming">
                                            <span class="date-day">22</span>
                                            <span class="date-month">DÉC</span>
                                        </div>
                                        <div class="reservation-details">
                                            <h4 class="reservation-title">Dîner d'Affaires</h4>
                                            <p class="reservation-meta">
                                                <i class="fas fa-clock mr-1"></i>12:30 •
                                                <i class="fas fa-users mr-1 ml-2"></i>4 personnes
                                            </p>
                                        </div>
                                    </div>
                                    <div class="reservation-status confirmed">
                                        <i class="fas fa-check-circle mr-2"></i>
                                        Confirmée
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Orders -->
                    <div class="dashboard-card mt-8">
                        <div class="dashboard-card-header">
                            <h3 class="dashboard-card-title">
                                <i class="fas fa-receipt mr-3 text-accent-gold"></i>
                                Dernières Commandes
                            </h3>
                            <a href="{{ route('orders.index') }}" class="text-accent-gold hover:text-accent-gold-dark font-semibold text-sm">
                                Voir tout
                            </a>
                        </div>
                        <div class="dashboard-card-content">
                            <div class="overflow-x-auto">
                                <table class="orders-table">
                                    <thead>
                                        <tr>
                                            <th>Commande</th>
                                            <th>Date</th>
                                            <th>Montant</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="order-info">
                                                    <div class="order-title">#ORD-0012</div>
                                                    <div class="order-items">3 articles</div>
                                                </div>
                                            </td>
                                            <td>14 Déc 2024</td>
                                            <td>86,50€</td>
                                            <td>
                                                <span class="status-badge delivered">
                                                    Livrée
                                                </span>
                                            </td>
                                            <td>
                                                <button class="action-btn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="order-info">
                                                    <div class="order-title">#ORD-0011</div>
                                                    <div class="order-items">2 articles</div>
                                                </div>
                                            </td>
                                            <td>12 Déc 2024</td>
                                            <td>54,00€</td>
                                            <td>
                                                <span class="status-badge completed">
                                                    Terminée
                                                </span>
                                            </td>
                                            <td>
                                                <button class="action-btn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Quick Actions -->
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            <h3 class="dashboard-card-title">
                                <i class="fas fa-bolt mr-3 text-accent-gold"></i>
                                Actions Rapides
                            </h3>
                        </div>
                        <div class="dashboard-card-content">
                            <div class="space-y-3">
                                <a href="{{ route('reservation.create') }}" class="quick-action-btn">
                                    <i class="fas fa-calendar-plus text-blue-500"></i>
                                    <span>Nouvelle Réservation</span>
                                </a>
                                <a href="{{ route('menu') }}" class="quick-action-btn">
                                    <i class="fas fa-book text-green-500"></i>
                                    <span>Voir le Menu</span>
                                </a>
                                <a href="{{ route('profile.edit') }}" class="quick-action-btn">
                                    <i class="fas fa-user-edit text-purple-500"></i>
                                    <span>Modifier le Profil</span>
                                </a>
                                <a href="{{ route('favorites') }}" class="quick-action-btn">
                                    <i class="fas fa-heart text-red-500"></i>
                                    <span>Mes Favoris</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Favorites -->
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            <h3 class="dashboard-card-title">
                                <i class="fas fa-heart mr-3 text-accent-gold"></i>
                                Vos Favoris
                            </h3>
                        </div>
                        <div class="dashboard-card-content">
                            <div class="space-y-4">
                                <div class="favorite-item">
                                    <img src="https://images.unsplash.com/photo-1563379926898-05f4575a45d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80"
                                         alt="Filet de bœuf"
                                         class="favorite-image">
                                    <div class="favorite-details">
                                        <h4 class="favorite-title">Filet de Bœuf Rossini</h4>
                                        <p class="favorite-price">42€</p>
                                    </div>
                                    <button class="favorite-remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div class="favorite-item">
                                    <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80"
                                         alt="Fondant au chocolat"
                                         class="favorite-image">
                                    <div class="favorite-details">
                                        <h4 class="favorite-title">Fondant au Chocolat</h4>
                                        <p class="favorite-price">12€</p>
                                    </div>
                                    <button class="favorite-remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Special Offers -->
                    <div class="dashboard-card bg-gradient-to-r from-accent-gold to-accent-gold-dark text-primary-dark">
                        <div class="dashboard-card-content text-center py-6">
                            <i class="fas fa-gift text-3xl mb-3"></i>
                            <h4 class="font-playfair font-bold text-lg mb-2">Offre Spéciale</h4>
                            <p class="text-sm mb-4">-20% sur le menu dégustation ce weekend</p>
                            <button class="bg-primary-dark text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-primary-light transition-colors">
                                Voir l'offre
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Stats Cards */
        .stats-card {
            @apply bg-white rounded-2xl p-6 shadow-soft border border-gray-100 hover:shadow-medium transition-all duration-300 group-hover:transform group-hover:-translate-y-1;
        }

        .stats-icon {
            @apply w-12 h-12 rounded-2xl flex items-center justify-center text-xl mb-4;
        }

        .stats-label {
            @apply text-gray-600 text-sm font-medium;
        }

        .stats-value {
            @apply text-3xl font-bold text-primary-dark mt-1;
        }

        .stats-change {
            @apply text-sm text-gray-500 mt-2 flex items-center;
        }

        .stats-change.positive {
            @apply text-green-600;
        }

        /* Dashboard Cards */
        .dashboard-card {
            @apply bg-white rounded-2xl shadow-soft border border-gray-100 overflow-hidden;
        }

        .dashboard-card-header {
            @apply flex items-center justify-between p-6 border-b border-gray-100;
        }

        .dashboard-card-title {
            @apply text-xl font-playfair font-bold text-primary-dark flex items-center;
        }

        .dashboard-card-content {
            @apply p-6;
        }

        /* Reservation Items */
        .reservation-item {
            @apply flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors;
        }

        .reservation-info {
            @apply flex items-center space-x-4;
        }

        .reservation-date {
            @apply w-14 h-14 bg-white rounded-xl border border-gray-200 flex flex-col items-center justify-center text-center;
        }

        .reservation-date.upcoming {
            @apply border-accent-gold bg-accent-gold bg-opacity-5;
        }

        .date-day {
            @apply text-lg font-bold text-primary-dark;
        }

        .date-month {
            @apply text-xs text-gray-500 uppercase;
        }

        .reservation-title {
            @apply font-semibold text-primary-dark;
        }

        .reservation-meta {
            @apply text-sm text-gray-600 flex items-center mt-1;
        }

        .reservation-status {
            @apply px-3 py-1 rounded-full text-sm font-semibold flex items-center;
        }

        .reservation-status.confirmed {
            @apply bg-green-100 text-green-800;
        }

        .reservation-status.pending {
            @apply bg-amber-100 text-amber-800;
        }

        /* Orders Table */
        .orders-table {
            @apply w-full text-sm;
        }

        .orders-table th {
            @apply text-left py-3 px-4 font-semibold text-gray-600 border-b border-gray-100;
        }

        .orders-table td {
            @apply py-3 px-4 border-b border-gray-100;
        }

        .orders-table tr:hover {
            @apply bg-gray-50;
        }

        .order-title {
            @apply font-semibold text-primary-dark;
        }

        .order-items {
            @apply text-xs text-gray-500;
        }

        .status-badge {
            @apply px-2 py-1 rounded-full text-xs font-semibold;
        }

        .status-badge.delivered {
            @apply bg-green-100 text-green-800;
        }

        .status-badge.completed {
            @apply bg-blue-100 text-blue-800;
        }

        .action-btn {
            @apply w-8 h-8 rounded-full bg-gray-100 hover:bg-accent-gold hover:text-white flex items-center justify-center transition-colors;
        }

        /* Quick Actions */
        .quick-action-btn {
            @apply flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition-colors;
        }

        .quick-action-btn i {
            @apply text-xl;
        }

        /* Favorites */
        .favorite-item {
            @apply flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition-colors;
        }

        .favorite-image {
            @apply w-12 h-12 rounded-lg object-cover;
        }

        .favorite-details {
            @apply flex-1;
        }

        .favorite-title {
            @apply font-semibold text-primary-dark text-sm;
        }

        .favorite-price {
            @apply text-accent-gold font-semibold text-sm;
        }

        .favorite-remove {
            @apply w-6 h-6 rounded-full bg-gray-100 hover:bg-red-100 hover:text-red-600 flex items-center justify-center transition-colors;
        }
    </style>
</x-app-layout>
