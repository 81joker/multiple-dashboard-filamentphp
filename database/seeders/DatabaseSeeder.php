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
        $this->call(BookingDateSeeder::class);
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Tim',
            'email' => 'tim26618@gmail.com',
            'role' => 'instructor',
        ]);
        User::factory()->create([
            'name' => 'ADMIN',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'PARENT',
            'email' => 'parent@gmail.com',
            'role' => 'parent',
        ]);
    }
}
