<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $categories = [
            'Fiksi' => 1,
            'Non-Fiksi' => 2,
            'Sains Populer' => 3,
            'Pengembangan Diri' => 4,
            'Buku Anak-anak' => 5
        ];

        $books = [
            1 => [
                ["To Kill a Mockingbird", "Harper Lee"],
                ["1984", "George Orwell"],
                ["Harry Potter and the Sorcerer's Stone", "J.K. Rowling"],
            ],
            2 => [
                ["Steve Jobs", "Walter Isaacson"],
                ["Becoming", "Michelle Obama"],
                ["Educated", "Tara Westover"],
            ],
            3 => [
                ["A Brief History of Time", "Stephen Hawking"],
                ["Sapiens: A Brief History of Humankind", "Yuval Noah Harari"],
                ["The Gene: An Intimate History", "Siddhartha Mukherjee"],
            ],
            4 => [
                ["The 7 Habits of Highly Effective People", "Stephen R. Covey"],
                ["Atomic Habits", "James Clear"],
                ["Mindset: The New Psychology of Success", "Carol S. Dweck"],
            ],
            5 => [
                ["Where the Wild Things Are", "Maurice Sendak"],
                ["The Giving Tree", "Shel Silverstein"],
                ["Matilda", "Roald Dahl"],
            ],
        ];

        foreach ($categories as $categoryName => $categoryId) {
            foreach ($books[$categoryId] as $book) {
                Book::create([
                    'title' => $book[0],
                    'category_id' => $categoryId,
                    'description' => $faker->paragraphs(4, true),
                    'quantity' => $faker->numberBetween(0, 100),
                    'file_path' => $faker->filePath(),
                    'cover_image' => $faker->imageUrl(640, 480, 'books'),
                    'user_id' => $faker->numberBetween(1, 10)
                ]);
            }
        }
    }
}
