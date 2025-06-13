<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Show the registration form
    public function show()
    {
        return view('auth.register');
    }

    // Handle the form submission and register user
    public function register(Request $request)
    {
        // Validate inputs
       $request->validate([
    'name' => ['required', 'regex:/^[A-Za-z\s]+$/'],
    'password' => [
        'required',
        'confirmed',
        'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/'
    ],
], [
    'name.regex' => 'Name must contain only letters and spaces.',
    'password.regex' => 'Password must have at least one uppercase letter, one lowercase letter, one special character, and be at least 8 characters.',
]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // hash password!
        ]);

        // Log the user in
    return redirect()->route('login')->with('success', 'Registered successfully! Please log in.');
    }
}
