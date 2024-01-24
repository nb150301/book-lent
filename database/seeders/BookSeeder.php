<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::truncate();

        $books = [
            [
                'name' => 'Không gia đình',
                'author_id' => 1,
                'book_category_id' => 2,
                'quantity' => 5,
                'image' => 'storage/app/upload/images/khong_gia_dinh.jpg'
            ],
            [
                'name' => 'Giết con chim nhại',
                'author_id' => 2,
                'book_category_id' => 1,
                'quantity' => 5,
                'image' => 'storage/app/upload/images/giet_con_chim_nhai.jpg'
            ],
            [
                'name' => 'Nhà giả kim',
                'author_id' => 3,
                'book_category_id' => 2,
                'quantity' => 5,
                'image' => 'storage/app/upload/images/nha_gia_kim.jpg'
            ],
            [
                'name' => 'Những người khốn khổ',
                'author_id' => 4,
                'book_category_id' => 1,
                'quantity' => 5,
                'image' => 'storage/app/upload/images/nhung_nguoi_khon_kho.jpg'
            ],
            [
                'name' => 'Don Quijote',
                'author_id' => 5,
                'book_category_id' => 2,
                'quantity' => 5,
                'image' => 'storage/app/upload/images/don_quijote.jpg'
            ],
        ];

        foreach ($books as $book) {
            $image = array_pop($book);
            $book = Book::create($book);
            $book->addMedia($image)->toMediaCollection();
        }
    }
}
