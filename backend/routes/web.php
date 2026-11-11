<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WaterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubscriptionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Ruta del Área VIP accesible para miembros y el administrador absoluto
Route::get('/exclusivo', function () {
    return view('exclusivo');
})->middleware(['auth', 'role:member,admin'])->name('exclusivo');

// Rutas para la solicitud de membresía local (Yape / Plin)
Route::middleware(['auth'])->group(function () {
    Route::get('/membresia', [SubscriptionController::class, 'index'])->name('subscription.index');
    Route::post('/membresia', [SubscriptionController::class, 'store'])->name('subscription.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    // Rutas para el control de hidratación
    Route::get('/water/get', [WaterController::class, 'getTodayLog']);
    Route::post('/water/update', [WaterController::class, 'update']);
});

// Rutas exclusivas del Administrador (Gestión de usuarios y aprobación de pagos)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::patch('/admin/users/{targetUser}/role', [AdminController::class, 'updateRole'])->name('admin.users.update');
    Route::patch('/admin/users/{targetUser}/approve', [AdminController::class, 'approveMember'])->name('admin.users.approve');
});

require __DIR__.'/auth.php';