<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(15),
            'category_id' => $this->faker->numberBetween(1, 8),
            'description' => $this->faker->text(30),
            'picture' => $this->faker->imageUrl($width = 640, $height = 480),
            'price' => $this->faker->randomNumber(5, false),
            'location' => $this->faker->city(),
            //'user_id' => $this->faker->randomNumber(1, false),
            'user_id' => $this->faker->numberBetween(1, 11),
        ];
    }
}
