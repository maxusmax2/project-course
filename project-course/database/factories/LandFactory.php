<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Land>
 */
class LandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'phone_number' => $this->faker->phoneNumber(),
            'description' => $this->faker->realText(),
            'cost' => $this->faker->numberBetween(50000,50000000),
            'cost_per_meter' => $this->faker->numberBetween(3000,450000),
            'total_area' => $this->faker->numberBetween(10,15000),
            'height' => $this->faker->numberBetween(2,5),
            'number_of_rooms'  => $this->faker->numberBetween(1,10),
            'object_type'  => $this->faker->numberBetween(),
            'city_name'  => $this->faker->city(),
            'district_name'  => $this->faker->streetName(),
            'street_name'=> $this->faker->streetName(),
            'building_number'=> $this->faker->numberBetween(1,1000),
            'created_at'=> now(),

        ];
    }
}
