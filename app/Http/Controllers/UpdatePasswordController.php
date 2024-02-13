<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UpdatePasswordController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['confirmed', 'required', 'min:6'],
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update([
                'password' => $request->password
            ]);

            return redirect()->route('profile.index', Auth::id())->with('updated', 'Your Credential has been Changed.');
        }

        throw ValidationException::withMessages([
            'password' => 'Your credential does not match with our records'
        ]);
    }
}
