<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $marque = $this->faker->word();
        $modele = $this->faker->word();
        $description = $this->faker->word();
        $prix = $this->faker->randomDigitNotNull();
        return [
            'marque' => $marque,
            'modele' => $modele,
            'description' => $description,
            'prix' => $prix,
        ];
    }
}
