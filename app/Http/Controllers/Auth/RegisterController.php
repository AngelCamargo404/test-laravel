<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {
        $data = $request->validated();
        
        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile-pictures', 'public');
            $data['profile_picture'] = $path;
        }

        // Create user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'age' => $data['age'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'role' => $data['role'],
            'profile_picture' => $data['profile_picture'] ?? null,
        ]);

        // Log in the user
        Auth::login($user);

        return redirect()->route('dashboard');
    }
}