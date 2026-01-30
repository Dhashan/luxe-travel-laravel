<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User; 
use App\Http\Resources\BookingResource;

class BookingController extends Controller
{
    public function index() 
    { 
        // Loads relations from ERD to avoid extra queries
        return BookingResource::collection(Booking::with(['user', 'destination', 'experience'])->get()); 
    }

    public function store(Request $request) 
    {
        $data = $request->validate([
            'destination_id' => 'required|exists:destinations,id', 
            'experience_id'  => 'nullable|exists:experiences,id',
            'booking_date'   => 'required|date|after:today', 
            'guests'         => 'required|integer', 
            'total_price'    => 'required|numeric'
        ]);

        $user = $request->user();
        
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $booking = $user->bookings()->create($data); 
        
        return new BookingResource($booking);
    }

    public function show(Booking $booking) 
    { 
        return new BookingResource($booking->load(['user', 'destination', 'experience'])); 
    }

    public function update(Request $request, Booking $booking) 
    { 
        // Admin user story: Update status (confirmed/cancelled)
        $booking->update($request->only('status')); 
        return new BookingResource($booking);
    }

    public function destroy(Booking $booking) 
    { 
        $booking->delete();
        return response()->json(['message' => 'Booking deleted']);
    }
}