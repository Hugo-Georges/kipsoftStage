<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Comment;
use App\Models\Motorisation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $motor = DB::table('motorisations')->insert([

            [
                'id' => 1,
                'type' => 'essence',
            ],

            [
                'id' => 2,
                'type' => 'diesel',
            ],

            [

                'id' => 3,

                'type' => 'électrique',

            ],

            [
                'id' => 4,
                'type' => 'gpl',
            ],

            [
                'id' => 5,
                'type' => 'hybride',
            ],

            [
                'id' => 6,
                'type' => 'non connu',
            ],

        ]);

        Car::factory()
        ->has(Comment::factory()->count(4))
        ->count(20)
        ->create();

        User::factory()
        ->count(2)
        ->create();


    }
}
