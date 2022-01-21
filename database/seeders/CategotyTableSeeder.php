<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategotyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Romance',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Thriller',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Comedy',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Horror',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Action',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Adventure',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Animation',
            'details'=>''
        ]);

    }
}
