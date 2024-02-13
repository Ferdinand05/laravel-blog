<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('posts');

        if ($keyword) {

            $posts = Post::query()
                ->where('title', 'like', "%$keyword%")
                ->orWhere('content', "like", "%$keyword%")->paginate(9);
        } else {
            $posts = Post::latest()->paginate(9);
        }

        return view('blog.index', ['posts' => $posts]);
    }
}
