<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController; // Ensure this is imported

/* --- Public Routes --- */
// Guests can view the catalog
Route::get('destinations', [DestinationController::class, 'index']);
Route::get('destinations/{destination}', [DestinationController::class, 'show']);
Route::get('experiences', [ExperienceController::class, 'index']);
Route::get('experiences/{experience}', [ExperienceController::class, 'show']);

// Authentication: Login is public
Route::post('/login', [AuthController::class, 'login']);

/* --- Protected Routes --- */
Route::middleware('auth:sanctum')->group(function () {
    
    // Authentication: Logout requires a valid token
    Route::post('/logout', [AuthController::class, 'logout']);

    // Returns current logged-in user profile
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Bookings and User Management
    Route::apiResource('users', UserController::class);
    Route::apiResource('bookings', BookingController::class);

    // Admin management for catalog
    Route::post('destinations', [DestinationController::class, 'store']);
    Route::put('destinations/{destination}', [DestinationController::class, 'update']);
    Route::delete('destinations/{destination}', [DestinationController::class, 'destroy']);

    Route::post('experiences', [ExperienceController::class, 'store']);
    Route::put('experiences/{experience}', [ExperienceController::class, 'update']);
    Route::delete('experiences/{experience}', [ExperienceController::class, 'destroy']);
});