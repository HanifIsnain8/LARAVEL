<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

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
        // // ]);

        User::create([
            'name'     => 'user1',
            'email'    => 'user1@gmail.com',
            'password' => bcrypt('user123'),
            'email_verified_at' => now(),
        ]);

    }
}
