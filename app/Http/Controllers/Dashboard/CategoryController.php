<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dahsboard\Category\storeRequest;
use App\Http\Requests\Dahsboard\Category\updateRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->get();
        return inertia()->render('Dashboard/categories/index', [
            'categories' => $categories,
        ]);
    }
    public function create()
    {
        $categories = Category::orderby('name', 'asc')->get();

        return inertia()->render('Dashboard/categories/create', [
            'categories' => $categories,
        ]);
    }


    public function store(storeRequest $request)
    {
        $category = new Category();

        $category->name = $request->name;

        $category->parent_id = $request->parent_id;


        $category->save();

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Category created successfully'
        ]);

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        // dd($category);
        $categories = Category::orderby('name', 'asc')->get();
        return inertia()->render('Dashboard/categories/edit', [
            'categories' => $categories,
            'category'  => $category
        ]);
    }


    public function update(Category $category, updateRequest $request)
    {
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Category updated successfully'
        ]);

        return redirect()->route('categories.index');
    }
}
