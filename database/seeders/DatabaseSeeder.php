<?php

namespace Database\Seeders;

use App\Models\activity_area;
use App\Models\company;
use App\Models\countries;
use App\Models\export_product;
use App\Models\import_product;
use App\Models\product;
use App\Models\token;
use App\Models\User;
use App\Models\usersToken;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // DUMMY DATA  --  DONT CHANGE THE ORDER OF SEEDS

        // Seed the countries table
        countries::factory(20)->create();

        // Seed the producct category table
        // \App\Models\product_category::factory(20)->create();

        // Seed the company table
        company::factory(10)->create();

        // Seed the product table
        product::factory(20)->create();

        // Seed the activity table - no more then 6
        activity_area::factory(6)->create();

        // comment this line when migrate seed for more then 1 time
        // or just migrate:fresh --seed
        User::factory(20)->create();

        token::factory(20)->create();

        export_product::factory(10)->create();

        import_product::factory(10)->create();

        usersToken::factory(20)->create();

<<<<<<< HEAD
=======
        $this->call(AdminSeeder::class);

>>>>>>> f230a2081e1312820a970c6d3c5e6f7bd81d72ef
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\User::factory(10)->create();

    }
}
