<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('q');
        $categorySlug = $request->get('kategori');

        $products = Product::with('category')
            ->search($search)
            ->when($categorySlug, function ($query) use ($categorySlug) {
                $query->whereHas('category', fn ($q) => $q->where('slug', $categorySlug));
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('pages.products', [
            'products' => $products,
            'categories' => Category::withCount('products')->get(),
            'search' => $search,
            'activeCategory' => $categorySlug,
        ]);
    }

    public function show(Product $product): View
    {
        $product->load(['category', 'images']);

        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(4)
            ->get();

        return view('pages.product-detail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }

    public function search(Request $request)
    {
        $term = $request->get('q', '');

        $products = Product::with('category')
            ->search($term)
            ->latest()
            ->take(8)
            ->get()
            ->map(fn (Product $p) => [
                'name' => $p->name,
                'slug' => $p->slug,
                'price' => $p->formatted_price,
                'category' => $p->category->name,
                'url' => route('products.show', $p),
            ]);

        return response()->json($products);
    }
}
