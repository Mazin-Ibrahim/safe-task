<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {

       

        $query = Product::query();
        if ($request->has('category_id') && $request->filled('category_id') && $request->input('category_id') != null) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }


        if ($request->has('company_id') && $request->filled('company_id') && $request->input('company_id') != null) {
            $query->where('company_id', $request->company_id);
        }

        return $query->with('images')->get();

     
    }
}
