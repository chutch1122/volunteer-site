<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    // List of all categories (view)
    public function index()
    {
        $all = Category::all();

        return view('categories.index')->with('categories', $all);
    }

    // Create category form (view)
    public function create()
    {
        return view('categories.create');
    }

    // Create action (data-storage)
    public function store(Request $request)
    {
        $category = Category::create($request->all());

        $category->save();

        return redirect('/categories')->with('success', 'Category created!');
    }

    // Show a single category (view)
    public function show($id)
    {
        $category = Category::where('id', $id)->get()->first();

        return view('categories.show')->with('category', $category);
    }

    // Modify category form (view)
    public function edit($id)
    {
        $category = Category::where('id', $id)->get()->first();

        return view('categories.edit')->with('category', $category);
    }

    // Update a category (data-storage)
    public function update($id, Request $request)
    {
        $category = Category::where('id', $id)->get()->first();

        $category->name = $request->get('name');

        $category->save();

        return redirect('/categories/' . $id)->with('success', 'Category updated!');
    }

    // Delete a category (data-storage)
    public function destroy($id)
    {
        $category = Category::where('id', $id)->get()->first();
        $category->delete();

        return redirect('/categories')->with('success', 'Category deleted!');
    }
}
