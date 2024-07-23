<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryAction;
use Illuminate\Http\Request;

class CategoryActionController extends Controller
{
    public function index($id)
    {
        $category = Category::find($id);

        $categoryActions = CategoryAction::all()->where("category_id", $id);

        return view('category_action.index', compact('category', 'categoryActions'));
    }

    public function create($id)
    {
        $category = Category::find($id);

        return view('category_action.create', compact('category'));
    }

    public function store($id, Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $post = CategoryAction::create([
            'category_id' => $id,
            'name' => $request->get('name')
        ]);

        if ($post) {
            return redirect()->route('dashboard.category.action.index', $id)->with('success', 'Category Action Created!');
        } else {
            return back();
        }
    }

    public function edit($id, $idCategoryAction)
    {
        $category = Category::find($id);

        $categoryAction = CategoryAction::where('category_id', $id)->where('id', $idCategoryAction)->first();

        return view('category_action.edit', compact('category', 'categoryAction'));
    }

    public function update($id, $idCategoryAction, Request $request)
    {
        $categoryAction = CategoryAction::where('category_id', $id)->where('id', $idCategoryAction)->first();

        $request->validate([
            'name' => 'required'
        ]);

        $update = $categoryAction->update([
            'name' => $request->get('name')
        ]);

        if ($update) {
            return redirect()->route('dashboard.category.action.edit', [$id, $categoryAction->id])->with('success', 'Category Action Updated!');
        } else {
            return back();
        }
    }

    public function delete($id, $idCategoryAction)
    {
        $categoryAction = CategoryAction::where('category_id', $id)->where('id', $idCategoryAction)->first();

        $delete = $categoryAction->delete();

        if ($delete) {
            return redirect()->route('dashboard.category.action.index', $id)->with('success', 'Category Action Deleted!');
        }
    }
}
