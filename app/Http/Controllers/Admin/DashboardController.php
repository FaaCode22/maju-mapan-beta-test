<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'productCount' => Product::count(),
            'categoryCount' => Category::count(),
            'featuredCount' => Product::where('is_featured', true)->count(),
            'messageCount' => ContactMessage::count(),
            'recentProducts' => Product::with('category')->latest()->take(5)->get(),
        ]);
    }
}
