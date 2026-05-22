<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([

            [
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'author' => 'J.K. Rowling',
                'category_id' => 1,
            ],

            [
                'title' => 'Harry Potter and the Chamber of Secrets',
                'author' => 'J.K. Rowling',
                'category_id' => 1,
            ],

            [
                'title' => 'Harry Potter and the Prisoner of Azkaban',
                'author' => 'J.K. Rowling',
                'category_id' => 1,
            ],

            [
                'title' => 'Harry Potter and the Goblet of Fire',
                'author' => 'J.K. Rowling',
                'category_id' => 1,
            ],

            [
                'title' => 'Harry Potter and the Order of the Phoenix',
                'author' => 'J.K. Rowling',
                'category_id' => 1,
            ],

        ]);
    }
}