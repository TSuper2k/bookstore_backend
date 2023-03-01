<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // DB::table('books')->insert([
        //     ['name' => 'One Piece', "description" => "Đây là mô tả truyện One Piece", "price" => "20000"],
        //     ['name' => 'Naruto', "description" => "Đây là mô tả truyện Naruto", "price" => "19000"],
        //     ['name' => 'Doraemon', "description" => "Đây là mô tả truyện Doraemon", "price" => "18000"],
        // ]);

        DB::table('users')->insert([
            ['name' => 'Duc', "email" => "duc@example.com", "password" => md5('12345'), "role" => 0],
            ['name' => 'Minh', "email" => "minh@example.com", "password" => md5('12345'), "role" => 1],
        ]);
    }
}
