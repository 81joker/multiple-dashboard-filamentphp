<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingDate extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\BookingDate::factory()->count(50)->hasPosts(1)->create();  
        // User::factory()
        // ->count(50)
        // ->hasPosts(1)
        // ->create();

    }
}
