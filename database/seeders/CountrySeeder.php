<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries') -> insert([
            ['country' => 'Afghanistan'],
            ['country' => 'Albania'],
            ['country' => 'Algeria'],
            ['country' => 'Andorra'],
            ['country' => 'Antigua and Barbuda'],
            ['country' => 'Bangladesh'],
            ['country' => 'Belarus'],
            ['country' => 'Belgium'],
            ['country' => 'Denmark'],
            ['country' => 'Egypt'],
            ['country' => 'Gabon'],
            ['country' => 'Kazakhstan'],
            ['country' => 'Malaysia'],
            ['country' => 'Monaco'],
            ['country' => 'Russia'],
            ['country' => 'Slovenia'],
            ['country' => 'Tanzania']

            // add other countries later

        ]);
    }
}
