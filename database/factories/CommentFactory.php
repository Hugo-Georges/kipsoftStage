<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $contenu = $this->faker->word();
        $car_id ="";
        return [
            'contenu' => $contenu,
            'car_id' => $car_id,
        ];
    }
}
