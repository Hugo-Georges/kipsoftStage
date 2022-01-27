<?php

namespace Database\Seeders;

use App\Models\Motorisation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('motorisations')->insert([

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

                'type' => 'électirque',

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
    }
}
