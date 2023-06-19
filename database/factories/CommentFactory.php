<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'content' => Str::random(25),
            // 'post_id' => 2,
            // 'parent'  => $this->faker->randomElement(['0','2']),
            // 'user_id' => 1,
        ];
    }
}
