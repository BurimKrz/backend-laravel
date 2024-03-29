<?php

namespace Database\Seeders;

use Database\Seeders\FileTypeSeeder;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            CompanyCategorySeeder::class,
            ProductCategorySeeder::class,
            CompanySubCategorySeeder::class,
            ProductSubcategorySeeder::class,
            ActivityAreaSeeder::class,
            AdminSeeder::class,
            CountrySeeder::class,
            FileTypeSeeder::class,
            LanguageSeeder::class,
            DatabaseSeeder::class,
            
        ]);
    }
}
