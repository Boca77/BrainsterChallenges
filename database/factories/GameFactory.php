<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'home_id' => Team::inRandomOrder()->first()->id,
            'away_id' => Team::inRandomOrder()->first()->id,
            'score' => fake()->randomDigit() . ' - ' . fake()->randomDigit(),
            'played_at' => fake()->dateTime()
        ];
    }
}
