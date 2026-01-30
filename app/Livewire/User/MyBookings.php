<?php

namespace App\Livewire\User;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MyBookings extends Component
{
    use WithPagination;
    
    public $showingBooking = null;
    public $viewingBookingDetails = false;

    public function render()
    {
        $bookings = Booking::with(['destination', 'experience'])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(6);

        return view('livewire.my-bookings', [
            'bookings' => $bookings
        ])->layout('layouts.app');
    }

    public function viewDetails($id)
    {
        $this->showingBooking = Booking::with(['destination', 'experience'])->findOrFail($id);
        $this->viewingBookingDetails = true;
    }

    public function closeModal()
    {
        $this->viewingBookingDetails = false;
        $this->showingBooking = null;
    }

    public function cancelBooking($id)
    {
        $booking = Booking::where('user_id', Auth::id())->findOrFail($id);
        
        if ($booking->status === 'pending') {
            $booking->delete();
            session()->flash('message', 'Booking request cancelled successfully.');
            $this->closeModal();
        }
    }

    public function speakToMichael()
    {
        session()->flash('message', 'Michael Rodriguez has been notified about your inquiry regarding this itinerary.');
        $this->closeModal();
    }
}
