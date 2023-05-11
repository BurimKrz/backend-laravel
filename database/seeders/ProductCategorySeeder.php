<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
<<<<<<< HEAD

=======
>>>>>>> feat/UC13_categorize_companies
    public function run(): void
    {
        DB::table('product_category') -> insert([
            ['name' => 'Fashion'],
            ['name' => 'Home'],
<<<<<<< HEAD
            ['name' => 'Accessories'],
=======
            ['name' => 'Acessories'],
>>>>>>> feat/UC13_categorize_companies
            ['name' => 'Sporting'],
            ['name' => 'Health'],
            ['name' => 'Medical'],
            ['name' => 'Pets'],
<<<<<<< HEAD
            ['name' => 'Fashion'],

        ]);
    }
=======
        ]);
    }

//     public function run(): void
// {
//     $categories = [        
//         ['name' => 'Fashion'],
//         ['name' => 'Home'],
//         ['name' => 'Acessories'],
//         ['name' => 'Sporting'],
//         ['name' => 'Health'],
//         ['name' => 'Medical'],
//         ['name' => 'Pets'],
//     ];

//     foreach ($categories as $category) {
//         if (!DB::table('product_category')->where('name', $category['name'])->exists()) {
//             DB::table('product_category')->insert($category);
//         }
//     }
// }

>>>>>>> feat/UC13_categorize_companies
}
