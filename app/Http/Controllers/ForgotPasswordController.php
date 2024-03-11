<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function index()
    {

        return view('auth.forgot-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);


        $token = Str::random(60);
        PasswordResetToken::updateOrCreate([
            'email' => $request->email
        ], [
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now('Asia/Jakarta')
        ]);

        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return back()->with('success', 'Email Reset password Has been sent!');
    }
}
