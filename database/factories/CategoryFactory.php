<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name_ar' => 'الرياضة' . Str::random(3),
            // 'name_en' => 'Entertainment' . Str::random(4),
            // 'img'     => $this->faker->randomElement(['news-500x280-3.jpg','news-500x280-5.jpg', 'news-500x280-6.jpg']),
            // 'slug_ar' => 'الرياضة' . Str::random(3),
            // 'slug_en' => 'Entertainment' . Str::random(4),
        ];
    }
}
