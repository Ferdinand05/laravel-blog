<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;
use Mews\Purifier\Purifier as PurifierPurifier;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('post.index', ['posts' => Post::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'content' => ['string', 'required'],
            'category' => ['required']
        ]);

        Post::create([
            'title' => Purifier::clean($request->title),
            'slug' => Str::slug($request->title) . auth()->id(),
            'content' => Purifier::clean($request->content),
            'category_id' => $request->category,
            'author' => auth()->user()->email,
            'user_id' => auth()->id()
        ]);

        return back()->with('success', 'Your Post has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post, 'posts' => Post::latest()->limit(3)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        Post::whereSlug($slug)->delete();
        return back()->with('success', 'Post has been deleted.');
    }
}
