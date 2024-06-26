<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaketInternet>
 */
class PaketInternetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_paket' => $this->faker->words(2, true), // Contoh: 'Paket Hemat', 'Paket Super'
            'kecepatan' => $this->faker->numberBetween(1, 100), // Kecepatan antara 1 Mbps sampai 100 Mbps
            'harga' => $this->faker->numberBetween(50000, 1000000), // Harga antara Rp 50.000 sampai Rp 1.000.000
            ];
        
    }
}
