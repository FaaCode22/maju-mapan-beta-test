<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', [
            'products' => Product::with('category')->latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $product = Product::create($this->prepareData($request));

        $this->handleThumbnail($request, $product);
        $this->handleImages($request, $product);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        $product->load('images');

        return view('admin.products.edit', [
            'product'    => $product,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($this->prepareData($request, $product));

        $this->handleThumbnail($request, $product);
        $this->handleImages($request, $product);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if ($product->thumbnail && !str_starts_with($product->thumbnail, 'http')) {
            $thumbPath = public_path($product->thumbnail);
            if (file_exists($thumbPath)) {
                unlink($thumbPath);
            }
        }

        foreach ($product->images as $image) {
            if (!str_starts_with($image->path, 'http')) {
                $imagePath = public_path($image->path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    public function destroyImage(ProductImage $image): RedirectResponse
    {
        if (!str_starts_with($image->path, 'http')) {
            $imagePath = public_path($image->path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $image->delete();

        return back()->with('success', 'Gambar berhasil dihapus.');
    }

    // -------------------------------------------------------------------------
    // Private helpers
    // -------------------------------------------------------------------------

    private function prepareData(ProductRequest $request, ?Product $product = null): array
    {
        $data = $request->validated();
        unset($data['thumbnail'], $data['images']);

        $data['slug']        = $data['slug'] ?: Str::slug($data['name']);
        $data['is_featured'] = $request->boolean('is_featured');

        if ($product && $data['slug'] === $product->slug) {
            unset($data['slug']);
        }

        return $data;
    }

    private function handleThumbnail(ProductRequest $request, Product $product): void
    {
        // Pakai link URL
        if ($request->filled('thumbnail_url')) {
            $product->update(['thumbnail' => $request->thumbnail_url]);
            return;
        }

        // Pakai upload file
        if (! $request->hasFile('thumbnail')) {
            return;
        }

        if ($product->thumbnail && !str_starts_with($product->thumbnail, 'http')) {
            $oldPath = public_path($product->thumbnail);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $file     = $request->file('thumbnail');
        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                    . '.' . $file->getClientOriginalExtension();
        $destDir  = public_path('images/products/thumbnails');

        if (! is_dir($destDir)) {
            mkdir($destDir, 0755, true);
        }

        $file->move($destDir, $filename);
        $product->update(['thumbnail' => 'images/products/thumbnails/' . $filename]);
    }

    private function handleImages(ProductRequest $request, Product $product): void
    {
        $sortOrder = $product->images()->max('sort_order') ?? 0;

        // Pakai link URL (pisah dengan koma)
        if ($request->filled('image_urls')) {
            $urls = array_filter(array_map('trim', explode(',', $request->image_urls)));
            foreach ($urls as $url) {
                $product->images()->create([
                    'path'       => $url,
                    'sort_order' => ++$sortOrder,
                ]);
            }
        }

        // Pakai upload file
        if (! $request->hasFile('images')) {
            return;
        }

        $destDir = public_path('images/products/gallery');
        if (! is_dir($destDir)) {
            mkdir($destDir, 0755, true);
        }

        foreach ($request->file('images') as $file) {
            $filename = time() . '_' . mt_rand(1000, 9999) . '_'
                        . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                        . '.' . $file->getClientOriginalExtension();

            $file->move($destDir, $filename);

            $product->images()->create([
                'path'       => 'images/products/gallery/' . $filename,
                'sort_order' => ++$sortOrder,
            ]);
        }
    }
}