<?php

namespace Database\Seeders;

use App\Models\PaketInternet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketInternetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaketInternet::factory()->count(10)->create();
    }
}
