<?php

namespace Database\Factories;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => '?',
            'nickName' => fake()->name(),
            'phoneNumber' => fake()->phoneNumber(),
            'bio' => fake()->text(200),
            'profile_image' => fake()->imageUrl()
        ];
    }
}
