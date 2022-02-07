<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
            'name' => 'Daniel',
            'id' => '1',
            'id_role' => '1',
            'email' => 'daniel@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'alamat' => 'Perumahan BDI',
            'gender' => 'm'
        ]);
        DB::table('users')->insert([
            'name' => 'RSUD Beriman Balikpapan',
            'id' => '2',
            'id_role' => '2',
            'email' => 'rsudBeriman@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'alamat' => 'Jl Mayjend Sutoyo'
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Donor Darah Balikpapan',
            'id' => '3',
            'id_role' => '3',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'alamat' => '-'
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
