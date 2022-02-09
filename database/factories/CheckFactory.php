<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CheckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comments' => $this->faker->text(300),
            'type' => $this->faker->randomElement(['comment', 'complete', 'incomplete']),
        ];
    }
}
