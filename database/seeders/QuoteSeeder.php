<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quotes = [
            [
                'quote' => 'A room without books is like a body without a soul.'
            ],
            [
                'quote' => 'There is no friend as loyal as a book.'
            ],
            [
                'quote' => 'One must always be careful of books,and what is inside them, for words have the power to change us.'
            ],
            [
                'quote' => 'If there\'s a book that you want to read, but it hasn\'t been written yet, then you must write it.'
            ],
            [
                'quote' => 'Books are a uniquely portable magic.'
            ],
            [
                'quote' => 'A mind needs books as a sword needs a whetstone, if it is to keep its edge.'
            ],
            [
                'quote' => 'Books are the quietest and most constant of friends; they are the most accessible and wisest of counselors, and the most patient of teachers.'
            ],
            [
                'quote' => 'Books may well be the only true magic'
            ],
            [
                'quote' => 'That\'s the thing about books. They let you travel without moving your feet.'
            ],
            [
                'quote' => 'Books are the mirrors of the soul.'
            ],
            [
                'quote' => 'Books are the plane, and the train, and the road. They are the destination, and the journey. They are home.'
            ],
            [
                'quote' => 'A book, too, can be a star, a living fire to lighten the darkness, leading out into the expanding universe.'
            ],
            [
                'quote' => 'Books should go where they will be most appreciated, and not sit unread, gathering dust on a forgotten shelf.'
            ],
            [
                'quote' => 'It is a good rule after reading a new book, never to allow yourself another new one till you have read an old one in between.'
            ],
            [
                'quote' => 'A house without books is like a room without windows.'
            ]

        ];
        \App\Models\Quote::insert($quotes);
    }
}
