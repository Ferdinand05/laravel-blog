<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user)
    {

        $posts = Post::where('user_id', auth()->id())->get();
        return view('profile.index', ['user' => User::find($user), 'posts' => $posts]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'alpha_num'],
            'email' => ['email', 'required']
        ]);

        User::whereId($id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return back()->with('updated', 'Your account name/email has been updated!');
    }
}
