<?php

use App\Http\Controllers\Front\GalleryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\MenuController;
use App\Http\Controllers\Front\ReservationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use Illuminate\Support\Facades\Route;

// Routes d'authentification
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/menu/{slug}', [MenuController::class, 'show'])->name('menu.show');

// Galerie
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Réservations
Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation/success', [ReservationController::class, 'success'])->name('reservation.success');

// Routes d'administration (protégées par auth et admin middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Les routes resource pour le CRUD - AVEC LES BONS CONTROLLEURS
    Route::resource('categories', CategoryController::class);
    Route::resource('dishes', DishController::class);
    Route::resource('reservations', AdminReservationController::class);
    Route::resource('gallery', AdminGalleryController::class);
});

// Route de test pour vérifier les routes admin
Route::get('/test-routes', function () {
    $routes = [
        'admin.dashboard' => route('admin.dashboard'),
        'admin.categories.index' => route('admin.categories.index'),
        'admin.dishes.index' => route('admin.dishes.index'),
        'admin.reservations.index' => route('admin.reservations.index'),
        'admin.gallery.index' => route('admin.gallery.index'),
    ];

    dd($routes);
})->middleware(['auth', 'admin']);
