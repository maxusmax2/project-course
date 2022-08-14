<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FavoriteBuild>
 */
class FavoriteBuildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_token'=> Str::random(100),
            'build_id' => $this->faker->numberBetween(1,150),
            'build_type' => Arr::random(['commercial','land','rooms','apartments','cottages']),
            'created_at'=> now(),

        ];
    }
}
