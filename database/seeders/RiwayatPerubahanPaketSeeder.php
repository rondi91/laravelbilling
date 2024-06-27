<?php

namespace Database\Seeders;

use App\Models\RiwayatPerubahanPaket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiwayatPerubahanPaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RiwayatPerubahanPaket::factory()->count(4)->create();
    }
}
