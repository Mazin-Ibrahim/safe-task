<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories()
    {
        return Category::where('parent_id', null)->get();
    }

    
    public function getSubcategories(Category $category)
    {
        return Category::where('parent_id', $category->id)->with('childs')->get();
    }

    public function getSubcategoryChilds(Category $category)
    {
        return $category->load('childs');
    }
}
   