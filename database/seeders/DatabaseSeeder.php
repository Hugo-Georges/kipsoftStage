<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Comment;
use App\Models\Motorisation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Car::factory()
        ->has(Motorisation::factory())
        ->has(Comment::factory()->count(4))
        ->count(20)
        ->create();
    }
}
