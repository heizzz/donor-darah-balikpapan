<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('roles')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('roles')->insert([
            'name' => 'User',
            'id' => '1'
        ]);
        DB::table('roles')->insert([
            'name' => 'Admin Rumah Sakit',
            'id' => '2'
        ]);
        DB::table('roles')->insert([
            'name' => 'Admin',
            'id' => '3'
          ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
