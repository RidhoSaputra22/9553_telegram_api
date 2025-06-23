<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();



        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'hp' => '08123456789',
            'password' => Hash::make('admin'),
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'hp' => '081344968521',
            'password' => Hash::make('user'),
        ]);

        $this->call([
            ChatSeeder::class,
        ]);
    }
}