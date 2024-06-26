<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PaketInternet;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


             $this->call([
                PelangganSeeder::class,
              
            ]);
             $this->call([
                PaketInternetSeeder::class,
              
            ]);
             $this->call([
                PenagihanSeeder::class,
              
            ]);
    }
}
