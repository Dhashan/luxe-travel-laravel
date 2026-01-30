<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use App\Models\User;
use App\Models\Destination;
use App\Models\Experience;
use Livewire\Component;
use Livewire\WithPagination;

class Bookings extends Component
{
    use WithPagination;

    public $user_id, $destination_id, $experience_id, $booking_date, $guests, $total_price, $status, $bookingId;
    public $isOpen = false;

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'destination_id' => 'required|exists:destinations,id',
        'experience_id' => 'nullable|exists:experiences,id',
        'booking_date' => 'required|date',
        'guests' => 'required|integer|min:1',
        'total_price' => 'required|numeric|min:0',
        'status' => 'required|in:pending,confirmed,cancelled',
    ];

    public function render()
    {
        return view('livewire.bookings', [
            'bookings' => Booking::with(['user', 'destination', 'experience'])->latest()->paginate(10),
            'users' => User::all(),
            'destinations' => Destination::all(),
            'experiences' => Experience::all(),
        ])->layout('layouts.admin');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function toggleForm()
    {
        $this->isOpen = !$this->isOpen;
        if (!$this->isOpen) {
            $this->resetInputFields();
        }
    }

    private function resetInputFields()
    {
        $this->user_id = '';
        $this->destination_id = '';
        $this->experience_id = '';
        $this->booking_date = '';
        $this->guests = '';
        $this->total_price = '';
        $this->status = 'pending';
        $this->bookingId = '';
    }

    public function store()
    {
        $this->validate();

        Booking::updateOrCreate(['id' => $this->bookingId], [
            'user_id' => $this->user_id,
            'destination_id' => $this->destination_id,
            'experience_id' => $this->experience_id,
            'booking_date' => $this->booking_date,
            'guests' => $this->guests,
            'total_price' => $this->total_price,
            'status' => $this->status,
        ]);

        session()->flash('message', 
            $this->bookingId ? 'Booking Updated Successfully.' : 'Booking Created Successfully.');

        $this->isOpen = false;
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $this->bookingId = $id;
        $this->user_id = $booking->user_id;
        $this->destination_id = $booking->destination_id;
        $this->experience_id = $booking->experience_id;
        $this->booking_date = $booking->booking_date;
        $this->guests = $booking->guests;
        $this->total_price = $booking->total_price;
        $this->status = $booking->status;

        $this->isOpen = true;
    }

    public function delete($id)
    {
        Booking::find($id)->delete();
        session()->flash('message', 'Booking Deleted Successfully.');
    }
}
