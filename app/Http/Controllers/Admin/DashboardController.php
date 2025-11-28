<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Reservation;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'totalDishes' => Dish::count(),
            'totalCategories' => Category::count(),
            'pendingReservations' => Reservation::pending()->count(),
            'totalReservations' => Reservation::count(),
        ];

        $recentReservations = Reservation::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // CORRECTION : Utiliser une méthode plus simple pour les plats populaires
        // Pour l'instant, on prend les plats featured
        $popularDishes = Dish::where('is_featured', true)
            ->orderBy('sort_order')
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact('stats', 'recentReservations', 'popularDishes'));
    }
}
