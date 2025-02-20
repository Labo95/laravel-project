<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Show all users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users')); // Pass data to the view
    }

    // Show the edit form for a specific user
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find user by ID
        return view('users.edit', compact('user')); // Pass user data to edit view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'created_at' => 'required|date',
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->created_at = $request->created_at; // Update created_at
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }
    
        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
    
}
