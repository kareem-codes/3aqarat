<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user if not exists
        User::firstOrCreate(
            ['email' => 'admin@3aqarat.com'],
            [
                'name' => 'مدير النظام',
                'password' => bcrypt('password'),
            ]
        );

        // Seed all data
        $this->call([
            AgentSeeder::class,
            ProjectSeeder::class,
            PropertySeeder::class,
            LeadSeeder::class,
        ]);
    }
}
