<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class Users extends Component
{
    use WithPagination;

    public $name, $email, $password, $role = 'user', $userId;
    public $isOpen = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->userId)],
            'password' => $this->userId ? 'nullable|min:8' : 'required|min:8',
            'role' => 'required|in:user,admin',
        ];
    }

    public function render()
    {
        return view('livewire.admin-users', [
            'users' => User::latest()->paginate(10)
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
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = 'user';
        $this->userId = '';
    }

    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        User::updateOrCreate(['id' => $this->userId], $data);

        session()->flash('message', 
            $this->userId ? 'User Updated Successfully.' : 'User Created Successfully.');

        $this->isOpen = false;
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->password = ''; // Clear password field for security

        $this->isOpen = true;
    }

    public function delete($id)
    {
        if (auth()->id() == $id) {
            session()->flash('error', 'You cannot delete yourself.');
            return;
        }

        User::find($id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }
}
