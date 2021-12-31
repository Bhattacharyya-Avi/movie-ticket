<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Seeder;

class SeatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seat::create([
            'seat_number'=>'A01',
            'details'=>''
        ]);
        Seat::create([
            'seat_number'=>'A02',
            'details'=>''
        ]);
        Seat::create([
            'seat_number'=>'A03',
            'details'=>''
        ]);
        Seat::create([
            'seat_number'=>'A04',
            'details'=>''
        ]);
        Seat::create([
            'seat_number'=>'A05',
            'details'=>''
        ]);

        Seat::create([
            'seat_number'=>'B01',
            'details'=>''
        ]);
        Seat::create([
            'seat_number'=>'B02',
            'details'=>''
        ]);
        Seat::create([
            'seat_number'=>'B03',
            'details'=>''
        ]);
        Seat::create([
            'seat_number'=>'B04',
            'details'=>''
        ]);
        Seat::create([
            'seat_number'=>'B05',
            'details'=>''
        ]);

        Seat::create([
            'seat_number'=>'C01',
            'details'=>''
        ]);
        Seat::create([
            'seat_number'=>'C02',
            'details'=>''
        ]);
        Seat::create([
            'seat_number'=>'C03',
            'details'=>''
        ]);
        Seat::create([
            'seat_number'=>'C04',
            'details'=>''
        ]);
        Seat::create([
            'seat_number'=>'C05',
            'details'=>''
        ]);
    }
}
