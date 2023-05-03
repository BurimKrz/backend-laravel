<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // comment this line when migrate seed for more then 1 time
        // or just migrate:fresh --seed
        $this->call(AdminSeeder::class);


        // call fake data and how many you need / 'factory(?)'

        \App\Models\countries::factory(20)->create();
        \App\Models\company::factory(20)->create();
        \App\Models\company_subcategory::factory(20)->create();
        \App\Models\company_category::factory(20)->create();
        \App\Models\companyType::factory(20)->create();



        \App\Models\product_category::factory(20)->create();

        \App\Models\product::factory(20)->create();



        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\User::factory(10)->create();

    }
}
