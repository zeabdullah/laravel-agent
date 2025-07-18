<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'provider_name' => $this->faker->randomElement(['google', 'anthropic', 'groq', 'openai', 'xai', 'deepseek']),
            'input_tokens_per_unit_cost' => $this->faker->randomFloat(2, 1, 20),
            'output_tokens_per_unit_cost' => $this->faker->randomFloat(2, 1, 20),
        ];
    }
}
