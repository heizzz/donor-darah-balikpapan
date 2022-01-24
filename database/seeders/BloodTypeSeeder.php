<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('blood_types')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('blood_types')->insert([
          'name' => 'A+',
          'id' => '1'
        ]);
        DB::table('blood_types')->insert([
            'name' => 'B+',
            'id' => '2'
        ]);
        DB::table('blood_types')->insert([
            'name' => 'O+',
            'id' => '3'
        ]);
        DB::table('blood_types')->insert([
            'name' => 'AB+',
            'id' => '4'
        ]);
        DB::table('blood_types')->insert([
            'name' => 'A-',
            'id' => '5'
          ]);
        DB::table('blood_types')->insert([
            'name' => 'B-',
            'id' => '6'
        ]);
        DB::table('blood_types')->insert([
            'name' => 'O-',
            'id' => '7'
        ]);
        DB::table('blood_types')->insert([
            'name' => 'AB-',
            'id' => '8'
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
