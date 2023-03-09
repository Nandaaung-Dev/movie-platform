<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppModelsMovie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'description' => fake()->sentence,
            'image' => fake()->image,
            'rating' => fake()->randomFloat(1, 1, 10),
            'category_id' => function () {
                return Category::all()->random()->id;
            }
        ];
    }
}
