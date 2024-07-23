<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $post = Category::create([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);

        if ($post) {
            return redirect()->route('dashboard.category.index')->with('success', 'Category Created!');
        } else {
            return back();
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $category = Category::find($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $update = $category->update([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);

        if ($update) {
            return redirect()->route('dashboard.category.edit', $category->id)->with('success', 'Category Updated!');
        } else {
            return back();
        }
    }

    public function delete($id)
    {
        $category = Category::find($id);

        $delete = $category->delete();

        if ($delete) {
            return redirect()->route('dashboard.category.index')->with('success', 'Category Deleted!');
        }
    }
}
