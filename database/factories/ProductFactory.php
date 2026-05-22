<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);

        return [
            'category_id' => Category::factory(),
            'name' => ucfirst($name),
            'slug' => Str::slug($name) . '-' . fake()->unique()->numberBetween(1, 9999),
            'price' => fake()->numberBetween(150000, 2500000),
            'short_description' => fake()->sentence(12),
            'description' => fake()->paragraphs(3, true),
            'specification' => implode("\n", fake()->sentences(5)),
            'benefits' => implode("\n", fake()->sentences(4)),
            'thumbnail' => null,
            'is_featured' => fake()->boolean(30),
        ];
    }

    public function featured(): static
    {
        return $this->state(fn () => ['is_featured' => true]);
    }
}
