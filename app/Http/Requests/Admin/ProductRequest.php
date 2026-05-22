<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product')?->id;

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:200', Rule::unique('products', 'slug')->ignore($productId)],
            'price' => ['required', 'integer', 'min:0'],
            'short_description' => ['required', 'string', 'max:500'],
            'description' => ['required', 'string'],
            'specification' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],
            'is_featured' => ['sometimes', 'boolean'],
            'thumbnail' => ['nullable', 'image', 'max:2048'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'max:2048'],
        ];
    }
}
