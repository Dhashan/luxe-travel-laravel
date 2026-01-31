<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use App\Models\Destination;
use App\Models\Experience;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

#[Layout('layouts.app')]
class TripPlanner extends Component
{
    public $step = 1;
    
    // Selection Data
    public $selectedDestinationId;
    public $selectedExperienceId;
    public $bookingDate;
    public $guests = 1;
    public $privateJetRequested = false;
    
    // UI Filters
    public $searchDestination = '';
    public $searchExperience = '';
    
    public function setStep($step)
    {
        $this->step = $step;
    }

    public function selectDestination($id)
    {
        $this->selectedDestinationId = $id;
        $this->selectedExperienceId = null; // Reset experience if destination changes
        $this->step = 2;
    }

    public function selectExperience($id)
    {
        $this->selectedExperienceId = $id;
        $this->step = 3;
    }

    public function skipExperience()
    {
        $this->selectedExperienceId = null;
        $this->step = 3;
    }

    public function finalizeDetails()
    {
        $this->validate([
            'bookingDate' => 'required|date|after:today',
            'guests' => 'required|integer|min:1|max:20',
        ]);
        $this->step = 4;
    }

    public function previousStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function incrementGuests()
    {
        if ($this->guests < 20) {
            $this->guests++;
        }
    }

    public function decrementGuests()
    {
        if ($this->guests > 1) {
            $this->guests--;
        }
    }

    // Computed Properties
    #[Computed]
    public function selectedDestination()
    {
        if (!$this->selectedDestinationId) return null;
        return Destination::find($this->selectedDestinationId);
    }

    #[Computed]
    public function selectedExperience()
    {
        if (!$this->selectedExperienceId) return null;
        return Experience::find($this->selectedExperienceId);
    }

    #[Computed]
    public function totalPrice()
    {
        $total = 0;
        if ($this->selectedDestination) {
            $total += $this->selectedDestination->base_price;
        }
        if ($this->selectedExperience) {
            $total += $this->selectedExperience->price;
        }
        return $total * (int)$this->guests;
    }

    public function submitBooking()
    {
        $this->validate([
            'bookingDate' => 'required|date|after:today',
            'guests' => 'required|integer|min:1',
            'selectedDestinationId' => 'required|exists:destinations,id',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'destination_id' => $this->selectedDestinationId,
            'experience_id' => $this->selectedExperienceId,
            'booking_date' => $this->bookingDate,
            'guests' => $this->guests,
            'total_price' => $this->totalPrice,
            'status' => 'pending',
        ]);

        session()->flash('message', 'Your luxury itinerary for ' . $this->selectedDestination->name . ' has been requested.');
        return redirect()->route('user.bookings');
    }

    public function render()
    {
        $destinations = Destination::where('name', 'like', '%' . $this->searchDestination . '%')->get();
        
        $experiences = [];
        if ($this->selectedDestinationId) {
            $experiences = Experience::where('destination_id', $this->selectedDestinationId)
                ->where('name', 'like', '%' . $this->searchExperience . '%')
                ->get();
        }

        return view('livewire.trip-planner', [
            'destinations' => $destinations,
            'experiences' => $experiences,
        ]);
    }
}
