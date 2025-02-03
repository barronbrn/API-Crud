<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('produk')->insert([
            [
                'namaPeralatan' => 'Tenda Dome',
                'jenis' => 'Tenda',
                'deskripsi' => json_encode(['Muat 4 orang', 'Anti air', 'Ringan']),
                'stok' => 10,
                'harga' => 50000,
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaPeralatan' => 'Sleeping Bag',
                'jenis' => 'Tidur',
                'deskripsi' => json_encode(['Hangat', 'Ringan', 'Mudah dibawa']),
                'stok' => 20,
                'harga' => 30000,
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
