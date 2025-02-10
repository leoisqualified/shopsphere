<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index() {
        // Fetch all products from the database
        $products = Product::latest()->paginate(10);
        $category = Category::all();

        // Return the view with the products
        return view('products.index', compact('products', 'category'));
    }

    public function show($id) {
        // Fetch the product with the given ID from the database
        $product = Product::findOrFail($id);

        // Return the view with the product
        return view('products.show', compact('product'));
    }
}
