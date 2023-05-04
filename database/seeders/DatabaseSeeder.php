<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\SubcategorySeeder;
use Database\Seeders\ActivityAreaSeeder;
use Database\Seeders\ProductCategorySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class
        ]);

        $this->call([
            CategorySeeder::class
        ]);

        $this->call([
            SubcategorySeeder::class
        ]);

        $this->call([
            ActivityAreaSeeder::class
        ]);

        $this->call([
            ProductCategorySeeder::class
        ]);

        //$this->call(AdminSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\User::factory(10)->create();

    }
}