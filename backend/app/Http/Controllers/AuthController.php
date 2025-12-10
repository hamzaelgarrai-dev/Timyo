<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => $data['password']
        
    ]);

    return response()->json([
        'message' => 'Registered successfully',
        'user' => $user
    ], 201);
}


public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!auth()->attempt($credentials)) {
        return response()->json(['message' => 'Invalid credentials']);
    }

    $request->session()->regenerate();

    return response()->json([
        'message' => 'Logged in successfully',
        'user' => auth()->user()
    ], 200);
}

public function logout(Request $request)
{
    auth()->guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return response()->json(['message' => 'Logged out']);
}


}
