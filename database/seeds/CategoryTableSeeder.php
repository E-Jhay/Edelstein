<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([

            //categories
            [
                'category_name' => 'Necklace'
            ],
            [
                'category_name' => 'Earing'
            ],
            [
                'category_name' => 'Bracelet'
            ],
            [
                'category_name' => 'Ring'
            ]
        ]);
    }
}
