<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        ProductCategory::insert([
            ['name' => 'Fashion'],
            ['name' => 'Home'],
            ['name' => 'Accessories'],
            ['name' => 'Sporting'],
            ['name' => 'Health'],
            ['name' => 'Pets'],
        ]);
    }
}
