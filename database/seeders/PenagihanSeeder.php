<?php

namespace Database\Seeders;

use App\Models\Penagihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penagihan::factory()->count(10)->create();
    }
}
