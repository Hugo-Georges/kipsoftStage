<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Comment;
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
        ->has(Comment::factory()->count(4))
        ->count(10)
        ->create();
    }
}
