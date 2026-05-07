<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
<<<<<<< HEAD
        return view('login.index');
        
=======
        return view('auth.index');
>>>>>>> 2c8d8d5d4b5a01bc60717d2f10198a02b4b6d17a
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            if ($user->role === 'tenant') {
                return redirect('/tenant/dashboard');
            }

            Auth::logout();
            return redirect('/login');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function store(Request $request)
<<<<<<< HEAD
    {   
        $full_name = $request->input('full_name');
        $email = $request->input('email');
        $password = $request->input('password');

        // save data into database
        User::create([
            'full_name' => $full_name,
            'email' => $email,
            'password' => $password,
=======
    {
        $request->validate([
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
>>>>>>> 2c8d8d5d4b5a01bc60717d2f10198a02b4b6d17a
        ]);

        User::create([
            'email'    => $request->email,
            'password' => Hash::make($request->password), // ← always hash passwords
        ]);

        return redirect()->route('login');
    }
}