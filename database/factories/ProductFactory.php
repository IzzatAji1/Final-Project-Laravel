<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),
            'category_id' => Category::factory(),
            'stock' => fake()->numberBetween(1, 100),
            'expired_at' => fake()->dateTimeBetween('2026-01-01', '2030-12-31'), // Modifikasi di sini
        ];        
    }
}


// $table->id();
// $table->string('name');
// $table->foreignId('category_id')->constrained(
//     table: 'categories', 
//     indexName: 'posts_category_id'
// );
// $table->integer('stock');
// $table->date('expired_at');