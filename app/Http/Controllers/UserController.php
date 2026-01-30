<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() { return UserResource::collection(User::all()); }

    public function store(Request $request) { // POST
        $data = $request->validate([
            'first_name' => 'required', 
            'last_name' => 'required',
            'email' => 'required|unique:users',
             'password' => 'required', 
             'role' => 'required'
        ]);
        $data['password'] = Hash::make($data['password']);
        return new UserResource(User::create($data));
    }

    public function show(User $user) { return new UserResource($user); }

    public function update(Request $request, User $user) { // PUT
        $user->update($request->all());
        return new UserResource($user);
    }

    public function destroy(User $user) { // DELETE
        $user->delete();
        return response()->json(['message' => 'User deleted']);
    }
}
