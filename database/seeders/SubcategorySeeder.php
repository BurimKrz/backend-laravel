<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('company_subcategories') -> insert([
            ['category' => 'Limited by Sheares'],
            ['category' => 'Limited by Guarante'],
            ['category' => 'Unlimited Company'],
            ['category' => 'Holding'],
            ['category' => 'Subsidiary'],
            ['category' => 'Assosiate'],
            ['category' => 'Listed'],
            ['category' => 'Unlisted'],
            ['category' => 'Goverment'],
            ['category' => 'Foreing'],
            ['category' => 'Section 8'],
        ]);
    }
}
