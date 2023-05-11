<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('company_categories') -> insert([
             ['name' => 'Limited by Sheares'],
            ['name' => 'Limited by Guarante'],
            ['name' => 'Unlimited Company'],
            ['name' => 'Holding'],
            ['name' => 'Subsidiary'],
            ['name' => 'Assosiate'],
            ['name' => 'Listed'],
            ['name' => 'Unlisted'],
            ['name' => 'Goverment'],
            ['name' => 'Foreing'],
            ['name' => 'Section 8'],
        ]);
    }
}