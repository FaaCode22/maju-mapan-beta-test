<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('pages.home', [
            'categories' => Category::withCount('products')->get(),
            'featuredProducts' => Product::with('category')->featured()->latest()->take(6)->get(),
        ]);
    }
}
