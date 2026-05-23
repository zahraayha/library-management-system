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

            [
                'title' => 'Harry Potter and the Half-Blood Prince',
                'author' => 'J.K. Rowling',
                'category_id' => 1,
            ],

            [
                'title' => 'Harry Potter and the Deathly Hallows',
                'author' => 'J.K. Rowling',
                'category_id' => 1,
            ],

            [
                'title' => 'Fantastic Beasts and Where to Find Them',
                'author' => 'J.K. Rowling',
                'category_id' => 1,
            ],

            [
                'title' => 'Fantastic Beasts: The Crimes of Grindelwald',
                'author' => 'J.K. Rowling',
                'category_id' => 1,
            ],

            [
                'title' => 'Fantastic Beasts: The Secrets of Dumbledore',
                'author' => 'J.K. Rowling',
                'category_id' => 1,
            ],

            [
                'title' => 'The Inheritance Games',
                'author' => 'Jennifer Lynn Barnes',
                'category_id' => 2,
            ],

            [
                'title' => 'The Hawthorne Legacy',
                'author' => 'Jennifer Lynn Barnes',
                'category_id' => 2,
            ],

            [
                'title' => 'The Final Gambit',
                'author' => 'Jennifer Lynn Barnes',
                'category_id' => 2,
            ],

            [
                'title' => 'Murder on the Orient Express',
                'author' => 'Agatha Christie',
                'category_id' => 7,
            ],

            [
                'title' => 'And Then There Were None',
                'author' => 'Agatha Christie',
                'category_id' => 7,
            ],

            [
                'title' => 'Death on the Nile',
                'author' => 'Agatha Christie',
                'category_id' => 7,
            ],

            [
                'title' => 'The Murder of Roger Ackroyd',
                'author' => 'Agatha Christie',
                'category_id' => 7,
            ],

            [
                'title' => 'Crooked House',
                'author' => 'Agatha Christie',
                'category_id' => 7,
            ],

            [
                'title' => 'Emma',
                'author' => 'Jane Austen',
                'category_id' => 3,
            ],

            [
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'category_id' => 3,
            ],

            [
                'title' => 'Sense and Sensibility',
                'author' => 'Jane Austen',
                'category_id' => 3,
            ],

            [
                'title' => 'Persuasion',
                'author' => 'Jane Austen',
                'category_id' => 3,
            ],

            [
                'title' => 'Northanger Abbey',
                'author' => 'Jane Austen',
                'category_id' => 3,
            ],

            [
                'title' => 'Malibu Rising',
                'author' => 'Taylor Jenkins Reid',
                'category_id' => 6,
            ],

            [
                'title' => 'Daisy Jones & The Six',
                'author' => 'Taylor Jenkins Reid',
                'category_id' => 6,
            ],

            [
                'title' => 'The Seven Husbands of Evelyn Hugo',
                'author' => 'Taylor Jenkins Reid',
                'category_id' => 6,
            ],

            [
                'title' => 'Little Women',
                'author' => 'Louisa May Alcott',
                'category_id' => 4,
            ],

            [
                'title' => 'Crazy Rich Asians',
                'author' => 'Kevin Kwan',
                'category_id' => 3,
            ],

            [
                'title' => 'One Piece',
                'author' => 'Eiichiro Oda',
                'category_id' => 1,
            ],

            [
                'title' => 'The Little Prince',
                'author' => 'Antoine de Saint-Exupéry',
                'category_id' => 4,
            ],

        ]);
    }
}