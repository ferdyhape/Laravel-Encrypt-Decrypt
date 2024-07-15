<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Services\EncryptionService;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $index = 1;
        return [
            'name' => "Product " . $index++,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->text,
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
