<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
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
            // 'slug_ar' => 'الرياضة' . Str::random(3),
            // 'slug_en' => 'Entertainment' . Str::random(4),
        ];
    }
}
