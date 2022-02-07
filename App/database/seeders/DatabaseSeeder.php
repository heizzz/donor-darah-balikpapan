<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(RoleTableSeeder::class);
        $this->call(BloodTypeTableSeeder::class);
        $this->call(BloodComponentTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BloodStockTableSeeder::class);
    }
}