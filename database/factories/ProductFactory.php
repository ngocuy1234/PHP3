<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'image' => 'https://product.hstatic.net/1000409762/product/sp11-2_d58d2329380c41f1885a093a5cf2f27c_large.jpg',
            'quantity' => 10,
            'price' => 200000,
            'price_sale' => 180000,
            'cate_id' => \App\Models\Category::all()->random()->id,
            'description' => $this->faker->sentence(40),
            // 'user_id' => 
            'intro_service' => $this->faker->sentence(40),
            'quantity_view' => 20,
        ];
    }
}
