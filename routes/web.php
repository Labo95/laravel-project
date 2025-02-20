<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Home Route (Redirects to Login Page)
Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Route (After Login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// User Management Routes (Accessible without login)
Route::get('/users', [UserController::class, 'index'])->name('users.index');  // Show all users
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');  // Edit form
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');  // Update user
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');  // Delete user
