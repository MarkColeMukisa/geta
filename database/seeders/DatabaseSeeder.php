<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // Admin account for local development
        User::factory()->create([
            'name' => 'Mark Cole',
            'email' => 'markcole683@gmail.com',
            'password' => bcrypt('mukisa256@wave'), // Set a secure password
            'is_admin' => true,
        ]);
    }
}
