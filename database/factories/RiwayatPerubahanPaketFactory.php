<?php

namespace Database\Factories;

use App\Models\PaketInternet;
use App\Models\pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RiwayatPerubahanPaket>
 */
class RiwayatPerubahanPaketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id_pelanggan = pelanggan::inRandomOrder()->first()->id;
        $paket_lama = PaketInternet::inRandomOrder()->first()->id;
        $paket_baru = PaketInternet::where('id', '!=', $paket_lama)->inRandomOrder()->first()->id;
    
        return [
            'pelanggan_id' => $id_pelanggan,
            'paket_lama_id' => $paket_lama,
            'paket_baru_id' => $paket_baru,
            'tanggal_perubahan' => $this->faker->date(),
        ];
       
    }
}
