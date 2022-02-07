<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'identifier' => Str::random(4),
            'image_url' => 'https://source.unsplash.com/200x200/daily?' . $this->faker->word,
            'parts' => $this->faker->numberBetween(10, 1200),
            'year' => $this->faker->numberBetween(1980, 2022),
            'theme_id' => $this->faker->numberBetween(1, 60),
        ];
    }
}
