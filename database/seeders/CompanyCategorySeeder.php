<?php

namespace Database\Seeders;

use App\Models\CompanyCategory;
use Illuminate\Database\Seeder;

class CompanyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Liability'],
            ['name' => 'Control'],
            ['name' => 'Stock'],
            ['name' => 'Others'],
        ];

        foreach ($categories as $category) {
            if (!CompanyCategory::where('name', $category['name'])->exists()) {
                CompanyCategory::create($category);
            }
        }
    }
}
