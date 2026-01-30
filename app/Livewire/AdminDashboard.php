<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Destination;
use App\Models\Booking;

class AdminDashboard extends Component
{
    public $stats = [];
    public $recentBookings = [];
    public $totalUsers;
    public $totalDestinations;
    public $dailyOps = [];
    public $systemHealth = [];
    public $recentActivity = [];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->totalUsers = User::count();
        $this->totalDestinations = Destination::count();
        $totalBookings = Booking::count();

        $this->stats = [
            'total_revenue' => Booking::sum('total_price'),
            'total_bookings' => $totalBookings,
            'confirmed_bookings' => Booking::where('status', 'confirmed')->count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'client_satisfaction' => 4.8, // Mocked as per request
        ];

        $this->recentBookings = Booking::with(['user', 'destination'])
            ->latest()
            ->take(4)
            ->get();

        $this->dailyOps = [
            'active_bookings' => Booking::where('status', 'confirmed')->count(),
            'pending_requests' => Booking::where('status', 'pending')->count(),
            'urgent_issues' => 3, // Mocked
            'completed_today' => 47, // Mocked
            'new_clients' => 12, // Mocked
            'revenue_today' => 28450, // Mocked
        ];

        $this->systemHealth = [
            'uptime' => '99.9%',
            'db_health' => 'Excellent',
            'api_response' => '142ms',
        ];

        $this->recentActivity = [
            ['title' => 'New User Registration', 'time' => '2 hours ago'],
            ['title' => 'Booking Confirmed', 'time' => '4 hours ago'],
            ['title' => 'Payment Processed', 'time' => '6 hours ago'],
        ];
    }

    public function render()
    {
        return view('livewire.admin-dashboard')
            ->layout('layouts.admin');
    }
}
