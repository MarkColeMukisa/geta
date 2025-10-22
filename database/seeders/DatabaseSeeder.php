<?php

namespace Database\Seeders;

use App\Models\Tenant;
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
            'name' => 'Abraham',
            'email' => 'abraham@gmail.com',
            'password' => bcrypt('abraham256@wave'), // Set a secure password
            'is_admin' => true,
        ]);

        // Create Tenants
        Tenant::factory(10)->create();
    }
}
