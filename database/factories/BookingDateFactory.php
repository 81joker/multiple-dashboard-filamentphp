<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BookingDate;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookingDate>
 */
class BookingDateFactory extends Factory
{
    protected $model = BookingDate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => fake()->word,
            'title' => fake()->sentence,
            'date' => fake()->date(),
            'start' => fake()->dateTimeBetween(now() , '+50 days'),
            'end' => fake()->dateTimeBetween(now() , '+10 days'),
            'color' => fake()->hexColor,
            'description' => fake()->paragraph,
            'url' => fake()->url,
            'created_on' => fake()->dateTime(),
            'created_from' => fake()->numberBetween(1, 100),  
        ];
    }
}
