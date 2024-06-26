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
            //  $this->call([
            //     PaketInternetSeeder::class,
              
            // ]);
            PaketInternet::create([
                'nama_paket' =>'PAKET 2M',
                'kecepatan'=>'2',
                'harga'=>'100000',
            ]);
            PaketInternet::create([
                'nama_paket' =>'PAKET 5M',
                'kecepatan'=>'5',
                'harga'=>'150000',
            ]);
            PaketInternet::create([
                'nama_paket' =>'PAKET 10M',
                'kecepatan'=>'10',
                'harga'=>'200000',
            ]);
             $this->call([
                PenagihanSeeder::class,
              
            ]);
             $this->call([
                PembayaranSeeder::class,
              
            ]);
    }
}
