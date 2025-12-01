<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Peluche Lapin Rose',
            'description' => 'Tout doux pour les câlins',
            'categories_id' => '2',
            'prix' => 24.99,
            'image' => 'images/lapin.jpg', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}