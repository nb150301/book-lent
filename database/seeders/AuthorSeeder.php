<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::truncate();

        $authors = [
            [
                'name' => 'Hector Malot'
            ],
            [
                'name' => 'Harper Lee',
            ],
            [
                'name' => 'Paulo Coelho'
            ],
            [
                'name' => 'Victor Hugo'
            ],
            [
                'name' => 'Miguel de Cervantes'
            ],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
