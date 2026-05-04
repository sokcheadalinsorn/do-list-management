<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login.index');
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

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // save data into database
        User::create([
            'email' => $email,
            'password' => $password,
        ]);

        return redirect()->route('dashboard');
    }
}  