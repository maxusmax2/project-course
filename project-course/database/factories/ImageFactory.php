<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'build_id' => $this->faker->numberBetween(1,150),
            'image_name' => Str::random(10).".jpg",
            'build_type' => Arr::random(['commercial','land','rooms','apartments','cottages']),
            'created_at'=> now(),

        ];
    }
}
