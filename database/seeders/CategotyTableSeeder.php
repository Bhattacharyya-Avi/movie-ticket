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
            'name'=>'Fiction',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Thriller',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Disaster',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Comedy',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Crime',
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
            'name'=>'Biographical',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Historical',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Drama',
            'details'=>''
        ]);

        Category::create([
            'name'=>'War',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Adventure',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Documentary',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Animation',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Experimental',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Super Hero',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Epic',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Short Film',
            'details'=>''
        ]);

        Category::create([
            'name'=>'Fantasy',
            'details'=>''
        ]);

    }
}
