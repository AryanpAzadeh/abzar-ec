<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ybazli\Faker\Facades\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
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
            'sub_title' => Faker::sentence(),
            'tag' => Faker::word(),
            'category_id' => 2,
            'image' => 'article-1.png',
            'body' => Faker::paragraph()
        ];
    }
}
