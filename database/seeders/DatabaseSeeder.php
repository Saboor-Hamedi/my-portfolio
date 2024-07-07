<?php

namespace Database\Seeders;

use App\Models\Posts;
use Illuminate\Support\Str;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(2)->create();

        DB::table('users')->insert([
            [
                "name" => "admin",
                "email" => 'admin@gmail.com',
                "password" =>  Hash::make("123"),
                "remember_token" => Str::random(10),
                "created_at" => Now(),
            ],
            [
                "name" => "guest",
                "email" => 'guest@gmail.com',
                "password" =>  Hash::make("123"),
                "remember_token" => Str::random(10),
                "created_at" => Now(),
            ]
        ]);

        Posts::factory(100)->create();
    }
}
