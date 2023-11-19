<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absensi>
 */
class AbsensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'divisions_id' => mt_rand(1, 3),
            'date' => fake()->date('d/m/Y'),
            'in' => fake()->date('H:i'),
            'out' => fake()->date('H:i'),
            'status' => 'Attend'
        ];
    }
}
