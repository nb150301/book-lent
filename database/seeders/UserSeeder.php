<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'User1',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'user',
            ],
            [
                'name' => 'User2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'user',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'admin',
            ],
            [
                'name' => 'User1',
                'email' => 'anhnguyen150301@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
