<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = Factory::create();
        $names = ['Monats-Abo', '10er Block','6 Monats-Abo', 'Jahres Abo'];
        foreach ($names as $name) {
            $price = fake()->randomElement(['140', '300', '750', '1400']);

            Product::create([
                'title' =>$name,
                'sort' => fake()->numberBetween($min = 1, $max = 10),
                'description' => fake()->paragraph(2),
                'term_month' => fake()->numberBetween($min = 1, $max = 12),
                'num_trainings' => fake()->numberBetween($min = 1, $max = 12),
                'price' => $price,
                'status' => rand(0, 1),

            ]);
        }
    }
}
