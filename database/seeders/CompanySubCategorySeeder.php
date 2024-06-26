<?php

namespace Database\Seeders;

use App\Models\CompanySubcategory;
use Illuminate\Database\Seeder;

class CompanySubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanySubcategory::insert([
            ['name' => 'Limited by Sheares', 'category_id' => 1],
            ['name' => 'Limited by Guarante', 'category_id' => 1],
            ['name' => 'Unlimited Company', 'category_id' => 1],
            ['name' => 'Holding', 'category_id' => 2],
            ['name' => 'Subsidiary', 'category_id' => 2],
            ['name' => 'Assosiate', 'category_id' => 2],
            ['name' => 'Listed', 'category_id' => 3],
            ['name' => 'Unlisted', 'category_id' => 3],
            ['name' => 'Goverment', 'category_id' => 4],
            ['name' => 'Foreing', 'category_id' => 4],
            ['name' => 'Section 8', 'category_id' => 4],
        ]);
    }
}
