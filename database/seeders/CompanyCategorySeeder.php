<?php

namespace Database\Seeders;

use App\Models\company_category;
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
            if (!company_category::where('name', $category['name'])->exists()) {
                company_category::create($category);
            }
        }
    }
}
