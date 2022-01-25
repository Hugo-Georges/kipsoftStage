<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Motorisation;
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
        $annee = $this->faker->randomDigitNotNull();
        $km = $this->faker->randomDigitNotNull();;
        $motor_id = Motorisation::inRandomOrder()->first()->id;

        return [
            'marque' => $marque,
            'modele' => $modele,
            'description' => $description,
            'prix' => $prix,
            'annee' => $annee,
            'km' => $km,
            'motor_id' => $motor_id,
        ];
    }
}
