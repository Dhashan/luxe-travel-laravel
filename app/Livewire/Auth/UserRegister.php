<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserRegister extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'user_type' => 'user', // Default to user
            'role' => 'customer', // Default role matching existing system
        ]);

        Auth::login($user);

        // Add a slight delay for psychological satisfaction of "processing" a premium membership
        usleep(1500000); 

        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.user-register')->layout('layouts.guest');
    }
}
