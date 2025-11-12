<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /**
         *
         * dateTimeBetween() does NOT understand 'created_at' as the previously generated value.
         * It treats it as a literal string → causing Faker to use its default behavior → generating random dates in the past (even 1990s or 2000s).
         *
         *
         * You must first generate the date, then reuse it: $created_at
         */
        $createdAt = fake()->dateTimeBetween('-2 years', 'now');

        return [
            'book_id' => null,
            'review' => fake()->paragraph,
            'rating' => fake()->numberBetween(1, 5),
            'created_at' => fake()->dateTimeBetween('-2 years'),
            'updated_at' => fake()->dateTimeBetween($createdAt, 'now'),
        ];
    }


    public function good()
    {
        return $this->state(function (array $attributes) {

            return [
                'rating'=> fake()->numberBetween(4 , 5),
            ];
        });
}
    public function average()
    {
        return $this->state(function (array $attributes) {

            return [
                'rating'=> fake()->numberBetween(2 , 4),
            ];
        });
    }

    public function bad()
    {
        return $this->state(function (array $attributes) {

            return [
                'rating'=> fake()->numberBetween(1 , 3),
            ];
        });
    }

}
