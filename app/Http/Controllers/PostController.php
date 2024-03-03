<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;
use Mews\Purifier\Purifier as PurifierPurifier;
use PDO;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        if ($keyword) {
            $posts = Post::with(['category', 'user'])->where('title', 'like', "%$keyword%")->orWhere('content', 'like', "%$keyword%")
                ->orWhere('author', 'like', "%$keyword%")->orWhere('created_at', 'like', "%$keyword%")->orderBy('created_at', 'desc')->paginate(7);
        } else {
            $posts =  Post::with(['category', 'user'])->orderBy('created_at', 'desc')->paginate(7);
        }
        return view('post.index', ['posts' => $posts]);
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
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => ['string', 'required'],
            'category' => ['required'],
            'content_image' => ['image', 'mimes:png,jpg,jpeg']
        ]);

        if ($request->hasFile('content_image')) {
            $image = $request->file('content_image')->store('post-images');
        } else {
            $image = null;
        }

        Post::create([
            'title' => Purifier::clean($request->title),
            'slug' => Str::slug($request->title) . auth()->id(),
            'content' => Purifier::clean($request->content),
            'content_image' => $image,
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
        return view('post.show', ['post' => $post, 'posts' => Post::with(['user', 'category'])->latest()->limit(3)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if ($post->user_id == auth()->id() || auth()->user()->hasRole('admin')) {
            return view('post.edit', ['post' => $post, 'categories' => Category::all()]);
        } else {
            return back()->with('fail', "you can't Edit other people post!");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'content' => ['required', 'string'],
            'category' => ['required'],
            'content_image' => ['image', 'mimes:png,jpg,jpeg']
        ]);

        $userPost = Post::where('slug', $slug)->first();


        if ($request->hasFile('content_image')) {
            $image = $request->file('content_image')->store('post-images');

            if (!$userPost->content_image == null) {
                Storage::delete($userPost->content_image);
            }
        } else {
            $image = $userPost->content_image;
        }
        Post::whereSlug($slug)->update([
            'title' =>  Purifier::clean($request->title),
            'content' => Purifier::clean($request->content),
            'content_image' => $image,
            'category_id' => $request->category,
            'slug' => Str::slug($request->title . auth()->id())
        ]);

        return redirect()->route('posts.index')->with('success', 'Post has been Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {

        $post = Post::where('slug', $slug)->first();

        if ($post->user_id == auth()->id() || auth()->user()->hasRole('admin')) {
            if ($post->content_image) {
                Storage::delete($post->content_image);
            }
            $post->delete();
            return back()->with('success', 'Post has been deleted.');
        } else {
            return back()->with('fail', "You can't delete other peple post!");
        }
    }
}
