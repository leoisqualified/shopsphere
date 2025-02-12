<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        // Fetch all categories from the database
        $categories = Category::all();

        // Return the view with the categories
        return view('categories.index', compact('categories'));
    }
}
