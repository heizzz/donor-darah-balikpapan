<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodComponentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('blood_components')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('blood_components')->insert([
          'name' => 'AHF',
          'id' => '1'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'BC',
            'id' => '2'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'FFP',
            'id' => '3'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'FFP Aferesis',
            'id' => '4'
          ]);
        DB::table('blood_components')->insert([
            'name' => 'FFP Fraksionasi',
            'id' => '5'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'FFP Konvalesen',
            'id' => '6'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'FP',
            'id' => '7'
          ]);
        DB::table('blood_components')->insert([
            'name' => 'Leukosit Aferesis',
            'id' => '8'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'Leucodepleted',
            'id' => '9'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'Leucodepletet',
            'id' => '10'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'Leucoreduce',
            'id' => '11'
          ]);
        DB::table('blood_components')->insert([
            'name' => 'Leucoreduced',
            'id' => '12'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'Leucoreduction',
            'id' => '13'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'LP',
            'id' => '14'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'LP Aferesis',
            'id' => '15'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'PCL',
            'id' => '16'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'PCLs',
            'id' => '17'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'PCR',
            'id' => '18'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'PK',
            'id' => '19'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'PRC',
            'id' => '20'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'PRC Aferesis',
            'id' => '21'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'PRC CPD',
            'id' => '22'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'PRC Leucodepleted',
            'id' => '23'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'PRC Leucoreduce',
            'id' => '24'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'PRC SAGM',
            'id' => '25'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'PRC-BCR',
            'id' => '26'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'PRP',
            'id' => '27'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'SAGM',
            'id' => '28'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'TC',
            'id' => '29'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'TC Aferesis',
            'id' => '30'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'TC Apheresi',
            'id' => '31'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'TC Apheresis',
            'id' => '32'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'TC APR',
            'id' => '33'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'TC-APH',
            'id' => '34'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'TCP',
            'id' => '35'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'WB',
            'id' => '36'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'WB FRESH',
            'id' => '37'
        ]);
        DB::table('blood_components')->insert([
            'name' => 'WE',
            'id' => '38'
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
