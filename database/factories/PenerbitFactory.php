<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penerbit>
 */
class PenerbitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Id_penerbit' => $this->faker->unique()->randomNumber,
            'Email' => $this->faker->company,
            'Nomor_Penerbit' => $this->faker->phoneNumber,
            'Alamat_Penerbit' => $this->faker->address,
        ];
    }
}
