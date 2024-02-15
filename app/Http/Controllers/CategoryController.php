<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('category.index', ['categories' => Category::with('post')->paginate('5')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required', 'string', 'min:3', 'alpha_dash']
        ]);

        Category::create([
            'category' => $request->category
        ]);

        return back()->with('success', 'Category has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('category.edit', ['category' => Category::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'category' => ['required', 'string', 'min:3', 'alpha_dash']
        ]);

        Category::whereId($id)->update([
            'category' => $request->category,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category has been Changed.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return back()->with('fail', 'Data has been deleted.');
    }
}
