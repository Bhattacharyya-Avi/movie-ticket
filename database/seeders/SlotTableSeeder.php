<?php

namespace Database\Seeders;

use App\Models\Slot;
use Illuminate\Database\Seeder;

class SlotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slot::create([
            'name'=>'slot1',
            'start'=>'10:00:00',
            'end'=>'14:00:00'
        ]);

        Slot::create([
            'name'=>'slot2',
            'start'=>'16:00:00',
            'end'=>'20:00:00'
        ]);

        Slot::create([
            'name'=>'slot3',
            'start'=>'21:00:00',
            'end'=>'00:00:00'
        ]);

        
    }
}
