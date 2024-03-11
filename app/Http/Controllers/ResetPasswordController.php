<?php

namespace App\Http\Controllers;

use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function index($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        $userToken = PasswordResetToken::whereToken($request->token)->first();
        if ($userToken) {
            $user = User::whereEmail($userToken->email)->first();
            $user->update([
                'password' => $request->password_confirmation
            ]);
            $userToken->delete();
            return redirect()->to(route('login'))->with('success', 'Your password has been Reset!');
        } else {

            return redirect()->to(route('login'))->with('fail', 'Invalid Token!');
        }
    }
}
