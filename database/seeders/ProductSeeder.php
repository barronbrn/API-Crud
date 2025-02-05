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
                'namaPeralatan' => 'Pangrango Set',
                'jenis' => 'Camping',
                // 'deskripsi' => json_encode(['Tenda Kapasitas 4-6', 'Carrier 60L', 'Sleeping Bag', 'Headlamp', '1 Set Alat Masak', 'Matras 1', 'Kompor Portabel 1']),
                'stok' => 2,
                'harga' => 125000.00,
                'foto' => url('https://down-id.img.susercontent.com/file/id-11134207-7rasi-m5b4w9impfswf8@resize_w450_nl.webp'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaPeralatan' => 'Papandayan Set',
                'jenis' => 'Camping',
                // 'deskripsi' => json_encode(['Tenda Kapasitas 4 Orang', 'Sleeping Bag 2', 'Matras 2']),
                'stok' => 2,
                'harga' => 85000.00,
                'foto' => url('https://www.nusaoutdoor.com/wp-content/uploads/2024/02/eiger-flash-3.webp'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaPeralatan' => 'Matras Camping',
                'jenis' => 'Camping',
                // 'deskripsi' => json_encode(['Tenda Kapasitas 4 Orang', 'Sleeping Bag 2', 'Matras 2']),
                'stok' => 2,
                'harga' => 5000.00,
                'foto' => url('https://down-id.img.susercontent.com/file/id-11134207-7rasc-m39qn0n5u2a7e7@resize_w450_nl.webp'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaPeralatan' => 'Burangrang Set',
                'jenis' => 'Camping',
                // 'deskripsi' => json_encode(['Carrier 60L', 'Sleeping Bag 1', 'Matras 1', 'Trekking Pole 1', 'Headlamp 1']),
                'stok' => 2,
                'harga' => 100000.00,
                'foto' => url('https://down-id.img.susercontent.com/file/sg-11134201-7ra3r-m4oaza7crjes91@resize_w450_nl.webp'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaPeralatan' => 'Dapur Hemat',
                'jenis' => 'Alat Masak',
                // 'deskripsi' => json_encode(['1 Kompor Portabel 2in1', 'Frying Pan', 'Panci Kecil 2', 'Spons/Busa', 'Sendok Nasi']),
                'stok' => 2,
                'harga' => 500000.00,
                'foto' => url('https://down-id.img.susercontent.com/file/id-11134207-7r98o-lpitog72y2uwca.webp'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
