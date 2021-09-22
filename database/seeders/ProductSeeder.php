<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Panasonic tv',
                'price' => '300',
                'description' => 'A tv with 4gb ram and more features',
                'category' => 'tv',
                'gallery' => 'https://cdn.pixabay.com/photo/2012/04/13/15/03/monitor-32743__340.png'
            ],
            [
                'name' => 'LG mobile',
                'price' => '200',
                'description' => 'A smartphone with 4gb ram and more features',
                'category' => 'mobile',
                'gallery' => 'https://cdn.pixabay.com/photo/2021/03/08/01/31/telefono-inteligente-6077907__340.jpg'
            ],
            [
                'name' => 'Sony tv',
                'price' => '600',
                'description' => 'A smart tv with 4gb ram and more features',
                'category' => 'tv',
                'gallery' => 'https://cdn.pixabay.com/photo/2017/08/10/07/44/tv-2619649__340.jpg'
            ],
            [
                'name' => 'LG fridge',
                'price' => '800',
                'description' => 'A smart fridge with 4gb ram and more features',
                'category' => 'fridge',
                'gallery' => 'https://cdn.pixabay.com/photo/2017/06/19/18/03/refrigerator-2420417__340.png'
            ]
        ]);
    }
}
