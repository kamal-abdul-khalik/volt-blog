<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id' => User::factory(),
            'title' => $title = $this->faker->sentence(),
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraph(20),
            'image' => $this->faker->imageUrl(),
            'published_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'featured' => $this->faker->boolean(10),
            'is_published' => $this->faker->boolean(10),
        ];
    }
}
