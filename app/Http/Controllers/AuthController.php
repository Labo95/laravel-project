<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show Login Form
    public function showLoginForm()
    {
        return view('login');
    }

    
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'password' => 'The password you entered is incorrect.',
    ])->withInput($request->except('password'));
}

    public function showRegistrationForm()
    {
        return view('register');
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
    

    // Show Dashboard (Only for Authenticated Users)
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        return view('dashboard');
    }

    // Handle Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
