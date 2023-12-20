<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "category_id" => rand(1,5),
            "name" => [
                'uz' => fake()->sentence(3),
                'ru'=> fake()->sentence(3),
            ],
            "price"=> rand(50000,10000000),
            "description" => [
                "uz"=> fake()->sentence(5),
                "ru"=> fake()->sentence(5),
            ]
        ];
    }
}
