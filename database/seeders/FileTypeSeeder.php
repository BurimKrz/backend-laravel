<?php

namespace Database\Seeders;

use App\Models\FileType;
use Illuminate\Database\Seeder;

class FileTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['type' => 'Main_img'],
            ['type' => 'Slide_img'],
            ['type' => 'PDF'],
        ];
        FileType::insert($types);
    }
}