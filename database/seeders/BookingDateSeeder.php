<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookingDate;

class BookingDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookingDate::factory()->count(50)->create(); 
    }
}
        // User::factory()
        // ->count(50)
        // ->hasPosts(1)
        // ->create();