<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            "beds" => fake()->numberBetween(1, 12),
            "baths" => fake()->numberBetween(1, 15),
            "area" => fake()->numberBetween(30, 1200),
            "city" => fake()->city(),
            "code" => fake()->postcode(),
            "street" => fake()->streetName(),
            "street_nr" => fake()->numberBetween(108, 998),
            "price" => fake()->numberBetween(20_000, 9_000_000),
            "by_user_id" => fake()->numberBetween(1, 10),
        ];
    }
}
