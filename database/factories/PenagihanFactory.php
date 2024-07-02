<?php

namespace Database\Factories;

use App\Models\PaketInternet;
use App\Models\pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penagihan>
 */
class PenagihanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pelanggan_id' => pelanggan::inRandomOrder()->first()->id,
            'paket_internet_id' => PaketInternet::inRandomOrder()->first()->id,
            'tanggal_penagihan' => $this->faker->date(),
            ];
    }
}
