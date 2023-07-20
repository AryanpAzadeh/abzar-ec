<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ybazli\Faker\Facades\Faker;

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
            'title' => Faker::sentence(),
            'slug' => $this->faker->slug(),
            'price' => $this->faker->numberBetween(200000,7000000),
            'discount' => $this->faker->numberBetween(5,85),
            'short_description' => Faker::sentence(),
            'features' => $this->faker->shuffleArray,
            'category_id' => $this->faker->numberBetween(1,3),
            'sub_category_id' => $this->faker->numberBetween(1,2),
            'brand_id' => $this->faker->numberBetween(1,3),
            'image' => 'fake.jpg',
            'description' => Faker::paragraph()
        ];
    }
}
