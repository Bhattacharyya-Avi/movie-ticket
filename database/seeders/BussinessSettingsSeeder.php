<?php

namespace Database\Seeders;

use App\Models\BussinessSettings;
use Illuminate\Database\Seeder;

class BussinessSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BussinessSettings::create([
            'name'=>'BUSTERX',
            'about'=>'BUSTERX is an online movie ticket booking site. you can book your seat online any time from any place.',
            'address'=>'BUSTERX',
            'email'=>'busterx@gmail.com',
            'contact'=>'01737352441',
        ]);
    }
}
