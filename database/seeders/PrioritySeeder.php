<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            CompanySubcategorySeeder::class,
            ProductSubcategorySeeder::class,
            ActivityAreaSeeder::class,
            AdminSeeder::class,
            DatabaseSeeder::class
        ]);
    }
}
