<?php

namespace App\Livewire;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserDashboard extends Component
{
    use WithPagination;

    public function render()
    {
        $user = Auth::user();
        $recentBookings = Booking::with(['destination', 'experience'])
            ->where('user_id', $user->id)
            ->latest()
            ->take(2)
            ->get();

        $totalTrips = Booking::where('user_id', $user->id)->count();
        $upcomingTrips = Booking::where('user_id', $user->id)
            ->where('status', 'confirmed')
            ->where('booking_date', '>=', now())
            ->count();

        return view('livewire.user-dashboard', [
            'recentBookings' => $recentBookings,
            'totalTrips' => $totalTrips,
            'upcomingTrips' => $upcomingTrips,
            'userName' => $user->name,
        ])->layout('layouts.app');
    }

    public function cancelBooking($id)
    {
        $booking = Booking::where('user_id', Auth::id())->findOrFail($id);
        
        if ($booking->status === 'pending') {
            $booking->delete();
            session()->flash('message', 'Booking cancelled successfully.');
        } else {
            session()->flash('error', 'Only pending bookings can be cancelled.');
        }
    }

    public function speakToConcierge()
    {
        // In a real app, this would trigger a chat or a notification to the concierge team
        session()->flash('message', 'An elite concierge specialist will be with you shortly.');
    }

    public function speakToMichael()
    {
        // Personal specialist contact request
        session()->flash('message', 'Michael Rodriguez has been notified and will contact you via your preferred secure channel.');
    }
}
