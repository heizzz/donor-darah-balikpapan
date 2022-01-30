<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodStockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('blood_stocks')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('blood_stocks')->insert([
            'id' => '1',
            'id_blood_type' => '1',
            'jumlah' => 105,
            'id_user' => 2
        ]);
        DB::table('blood_stocks')->insert([
            'id' => '2',
            'id_blood_type' => '2',
            'jumlah' => 100,
            'id_user' => 2
        ]);
        DB::table('blood_stocks')->insert([
            'id' => '3',
            'id_blood_type' => '3',
            'jumlah' => 80,
            'id_user' => 2
        ]);
        DB::table('blood_stocks')->insert([
            'id' => '4',
            'id_blood_type' => '4',
            'jumlah' => 95,
            'id_user' => 2
        ]);
        DB::table('blood_stocks')->insert([
            'id' => '5',
            'id_blood_type' => '5',
            'jumlah' => 21,
            'id_user' => 2
        ]);
        DB::table('blood_stocks')->insert([
            'id' => '6',
            'id_blood_type' => '6',
            'jumlah' => 17,
            'id_user' => 2
        ]);
        DB::table('blood_stocks')->insert([
            'id' => '7',
            'id_blood_type' => '7',
            'jumlah' => 16,
            'id_user' => 2
        ]);
        DB::table('blood_stocks')->insert([
            'id' => '8',
            'id_blood_type' => '8',
            'jumlah' => 24,
            'id_user' => 2
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
