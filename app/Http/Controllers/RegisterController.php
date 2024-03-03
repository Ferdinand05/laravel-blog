<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class RegisterController extends Controller
{
    public function register()
    {



        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $user->givePermissionTo(['view post', 'create post', 'delete post', 'edit post']);
        $user->assignRole('member');
        return redirect()->route('login')->with('success', 'Your account has been created.');
    }
}
