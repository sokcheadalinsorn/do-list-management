<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

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

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
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


    public function login(Request $request)
    {

        $user = User::where('email', $request->input('email'))->first();

        $password = User::where('password', $request->input('password'))->first();

        if ($user && $password) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withErrors(['msg' => 'The password and email not match']);
        }
    }


    public function register(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();

        if ($emailExists) {
            return back()->with('error', 'Email already exists');
        }

        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/login');
    }
}
