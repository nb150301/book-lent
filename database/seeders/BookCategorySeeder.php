<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Seeder;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookCategory::truncate();

        $bookCategories = [
            [
                'name' => 'Truyện ngắn'
            ],
            [
                'name' => 'Truyện dài',
            ],
        ];

        foreach ($bookCategories as $bookCategory) {
            BookCategory::create($bookCategory);
        }
    }
}
