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
        ProductSubcategory::insert([
            ['name' => 'T-shirt and sweatshirt', 'category_id' => 1],
            ['name' => 'Jackets', 'category_id' => 1],
            ['name' => 'Dresses and Skirts', 'category_id' => 1],
            ['name' => 'Jeans', 'category_id' => 1],
            ['name' => 'Dresses and Skirts', 'category_id' => 1],
            ['name' => 'Bag', 'category_id' => 1],
            ['name' => 'Socks', 'category_id' => 1],
            ['name' => 'Chair', 'category_id' => 2],
            ['name' => 'Table', 'category_id' => 2],
            ['name' => 'Bed', 'category_id' => 2],
            ['name' => 'Sofa', 'category_id' => 2],
            ['name' => 'Accessories', 'category_id' => 3],
            ['name' => 'Sneakers', 'category_id' => 4],
            ['name' => 'T-shirt', 'category_id' => 4],
            ['name' => 'Tracksuit', 'category_id' => 4],
            ['name' => 'Ball', 'category_id' => 4],
            ['name' => 'Fruits', 'category_id' => 5],
            ['name' => ' Nuts and Seeds', 'category_id' => 5],
            ['name' => 'Frozen foods', 'category_id' => 5],
            ['name' => 'Drinks', 'category_id' => 5],
            ['name' => ' Food', 'category_id' => 6],
            ['name' => 'Frozen foods', 'category_id' => 6],
            ['name' => 'Treats', 'category_id' => 6],
            ['name' => 'Toys', 'category_id' => 6],
            ['name' => 'Collars', 'category_id' => 6],
            ['name' => 'Cages', 'category_id' => 6],
            ['name' => 'Aquariums', 'category_id' => 6],
        ]);
    }

}
