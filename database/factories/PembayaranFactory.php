<?php

namespace Database\Factories;

use App\Models\Penagihan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'penagihan_id' => Penagihan::inRandomOrder()->first()->id,
            'jumlah' => $this->faker->numberBetween(50000, 1000000),
            'tanggal_pembayaran' => $this->faker->date(),
            'metode_pembayaran' => $this->faker->randomElement(['Transfer Bank', 'Kartu Kredit', 'Tunai']),
        
        ];
    }
}
