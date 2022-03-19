<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dahsboard\Product\storeRequest;
use App\Http\Requests\Dahsboard\Product\updateRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories', 'company', 'images')->get();

        return inertia()->render('Dashboard/products/index', [
            'products' => $products
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        $companies = Company::all();

        return inertia()->render('Dashboard/products/create', [
            'categories' => $categories,
            'companies' => $companies
        ]);
    }

    public function store(storeRequest $request)
    {
        // dd($request->all());
        // dd(collect($request->selectcategories)->pluck('id'));

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'company_id' => $request->company_id,
        ]);

        collect($request->images)->each(function ($image) use ($product) {
            $product->images()->create([
                'path' => $image->store('', 'public'),
                'imageable_type' => 'App\\Product'
            ]);
        });


        $product->categories()->sync(collect($request->selectcategories)->pluck('id'));

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Product created successfully'
        ]);

        return redirect()->route('products.index');
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        $companies = Company::all();

        return inertia()->render('Dashboard/products/edit', [
        'categories' => $categories,
        'companies' => $companies,
        'product' => $product->load('categories', 'company')
    ]);
    }


    public function update(Product $product, updateRequest $request)
    {
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'company_id' => $request->company_id,
        ]);

        if ($request->has('images')) {
            collect($request->images)->each(function ($image) use ($product) {
                $product->images()->update([
                    'path' => $image->store('', 'public'),
                    'imageable_type' => 'App\\Product'
                ]);
            });

            $product->categories()->sync(collect($request->selectcategories)->pluck('id'));

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'Product updated successfully'
            ]);
    
            return redirect()->route('products.index');
        }
    }
}
