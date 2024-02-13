<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }

    public function store(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->boolean('remember_me'))) {

            return redirect(RouteServiceProvider::HOME)->with('success', 'You are Logged in');
        }


        throw ValidationException::withMessages([
            'email' => 'Your credentials does not match with our records'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
