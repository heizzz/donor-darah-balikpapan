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
          'name' => 'pleb',
          'id' => '1',
          'id_role' => '1',
          'email' => 'aaa@gmail.com',
          'password' => Hash::make('aaaaaaaa'),
          'alamat' => 'jl isekai'
        ]);
        DB::table('users')->insert([
            'name' => 'admin rs',
            'id' => '2',
            'id_role' => '2',
            'email' => 'bbb@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'alamat' => 'jl isekai'
        ]);
        DB::table('users')->insert([
            'name' => 'admin app',
            'id' => '3',
            'id_role' => '3',
            'email' => 'ccc@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'alamat' => 'jl isekai'
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
