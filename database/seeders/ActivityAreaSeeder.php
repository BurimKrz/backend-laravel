<?php

namespace Database\Seeders;

use App\Models\ActivityArea;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActivityArea::insert([
            ['name' => 'Exporter'],
            ['name' => 'Importer'],
            ['name' => 'Servicer'],
            ['name' => 'Retailer'],
            ['name' => 'Wholesaler'],
            ['name' => 'Manifacturer'],
        ]);
    }
}
