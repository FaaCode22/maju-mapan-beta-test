<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'path',
        'sort_order',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getUrlAttribute(): string
    {
        if (str_starts_with($this->path, 'http://') || str_starts_with($this->path, 'https://')) {
            return $this->path;
        }

        $publicPath = public_path($this->path);
        if (is_file($publicPath)) {
            return asset($this->path);
        }

        if (Storage::disk('public')->exists($this->path)) {
            return Storage::disk('public')->url($this->path);
        }

        return asset('images/placeholder-product.svg');
    }
}
