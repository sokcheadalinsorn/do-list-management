<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showlogin()
    {
        return view('login.index');
    }

    public function showRegister()
    {
        return view('register.index');
    }

    public function login(Request $request)
    {
       $email = $request->input('email');
       $password = $request->input('password');

       User::create([
        'email' => $email,
        'password' => $password,
       ]);
    }

    
    public function register(Request $request)
    {
       $full_name = $request->input('full_name');
       $email = $request->input('email');
       $password = $request->input('password');

       User::create([
        'full_name' => $full_name,
        'email' => $email,
        'password' => $password,
       ]);

       return redirect()->route('dashboard');
    }
}
