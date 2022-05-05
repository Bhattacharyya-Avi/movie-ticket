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
        $this->call([BussinessSettingsSeeder::class, SeatTableSeeder::class, CategotyTableSeeder::class, UserTableSeeder::class, SlotTableSeeder::class]);
    }
}
