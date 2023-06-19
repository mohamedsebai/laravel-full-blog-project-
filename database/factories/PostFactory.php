<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        // 'title_ar' => 'title-slug' . Str::random(9),
        // 'title_en' => 'title-slug' . Str::random(9),
        // 'content_ar' => 'content-slug' . Str::random(300),
        // 'content_en' => 'content-slug' . Str::random(300),
        // 'slug_ar' => 'slug-ar' . Str::random(9),
        // 'slug_en' => 'slug-en' . Str::random(9),
        // 'classified' => $this->faker->randomElement(['featured','trendding','popular']),
        // 'img' => 'news-500x280-4.jpg',
        // 'category_id' => $this->faker->randomElement([1,2,3,4]),
        // 'user_id' => 1,
        ];
    }
}
