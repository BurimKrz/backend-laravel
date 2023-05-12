<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_subcategory')->insert([
            ['name' => 'Fashion', 'category_id' => 1],
            ['name' => 'Home', 'category_id' => 1],
            ['name' => 'Home', 'category_id' => 1],
            ['name' => 'Fashion', 'category_id' => 2],
            ['name' => 'Sporting', 'category_id' => 2],
            ['name' => 'Accessories', 'category_id' => 2],
            ['name' => 'Home', 'category_id' => 3],
            ['name' => 'Sporting', 'category_id' => 3],
            ['name' => 'Medical', 'category_id' => 4],
            ['name' => 'Sporting', 'category_id' => 4],
            ['name' => 'Medical', 'category_id' => 4],
        ]);
    }

}
