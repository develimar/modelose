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
    public function definition()
    {
        $title = $this->faker->paragraph(1);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'subtitle' => $this->faker->paragraph(1),
            'description' => $this->faker->paragraph(5),
            'author' => $this->faker->randomElement(User::all()->pluck('id')->toArray())
        ];
    }
}
