<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->realText(20),
            'price' => $this->faker->numberBetween(1,100),
            'amount' => $this->faker->numberBetween(0,50),
        ];
    }
}
