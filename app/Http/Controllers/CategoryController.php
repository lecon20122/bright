<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.modules.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.modules.categories.create', [
            'categories' => $categories,
        ]);
    }


    public function store(Request $request)
    {
        Category::create($request->all());
        return Redirect()->back()->with('success', 'Category Added Successfully');
    }


    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.modules.categories.edit', [
            'category' => $category,
            'categories' => $categories
        ]);
    }


    public function update(Category $category, Request $request)
    {
        // dd($request->all());
        $category->update($request->all());
        return Redirect()->to('admin/categories')->with('success', 'Category updated Successfully');
    }


    public function delete(Category $category)
    {
        $category->delete();
        return redirect('');
    }
}
