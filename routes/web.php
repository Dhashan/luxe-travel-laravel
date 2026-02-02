<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Destination;
use App\Models\Experience;
use App\Models\Booking;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// User Authentication Routes
if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration())) {
    Route::get('/register', \App\Livewire\Auth\UserRegister::class)->name('register');
}
Route::get('/login', \App\Livewire\Auth\UserLogin::class)->name('login');

// Password Reset Routes
if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::resetPasswords())) {
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->middleware(['guest'])->name('password.request');

    Route::get('/reset-password/{token}', function (Illuminate\Http\Request $request, $token) {
        return view('auth.reset-password', ['request' => $request, 'token' => $token]);
    })->middleware(['guest'])->name('password.reset');
}

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login.post');
    Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');
    Route::get('/redirect', [App\Http\Controllers\Admin\RedirectController::class, 'handle'])->name('redirect');
});

Route::post('/logout', [\App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/user/confirm-password', function (Illuminate\Http\Request $request) {
        return view('auth.confirm-password', ['request' => $request]);
    })->name('password.confirm');

    Route::get('/dashboard', \App\Livewire\UserDashboard::class)->name('dashboard');
    Route::get('/trip-planner', \App\Livewire\User\TripPlanner::class)->name('user.planner');
    Route::get('/my-itineraries', \App\Livewire\User\MyBookings::class)->name('user.bookings');

    // Admin Dashboard protected by role:admin middleware
    Route::get('/admin/dashboard', \App\Livewire\AdminDashboard::class)
        ->middleware('role:admin')
        ->name('admin.dashboard');

    // Admin CRUD Routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/destinations', \App\Livewire\Admin\Destinations::class)->name('destinations');
        Route::get('/experiences', \App\Livewire\Admin\Experiences::class)->name('experiences');
        Route::get('/bookings', \App\Livewire\Admin\Bookings::class)->name('bookings');
        Route::get('/users', \App\Livewire\Admin\Users::class)->name('users');
    });
});
