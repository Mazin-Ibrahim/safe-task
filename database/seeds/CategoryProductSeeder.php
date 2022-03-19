<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::pluck('id');
        Product::all()->each(function ($product) use ($categories) {
            $product->categories()->attach($categories);
        });
    }
}
