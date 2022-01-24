<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class MotorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->call(MotorTableSeeder::class);
        return [
            'type' => $type,
        ];
    }
}
