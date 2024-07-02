<?php

namespace Database\Factories;

use App\Models\PaketInternet;
use App\Models\pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tanggal_mulai = $this->faker->date();
        $tanggal_berakhir = $this->faker->date('Y-m-d', strtotime('+1 year', strtotime($tanggal_mulai)));
        $status = $this->faker->randomElement(['active', 'inactive']);

    return [
        'pelanggan_id' => pelanggan::inRandomOrder()->first()->id,
        'paket_id' => PaketInternet::inRandomOrder()->first()->id,
        'tanggal_mulai' => $tanggal_mulai,
        'tanggal_berakhir' => $tanggal_berakhir,
        'status' => $status,
    ];
    }
}
