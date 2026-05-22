<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Fantasy'],
            ['id' => 2, 'name' => 'Mystery'],
            ['id' => 3, 'name' => 'Romance'],
            ['id' => 4, 'name' => 'Classic'],
            ['id' => 5, 'name' => 'Thriller'],
            ['id' => 6, 'name' => 'Drama'],
            ['id' => 7, 'name' => 'Detective'],
            ['id' => 8, 'name' => 'General'],
        ]);
    }
}