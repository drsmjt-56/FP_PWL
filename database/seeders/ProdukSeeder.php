<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::insert([
        [    'id_produk' => 'PRD001',
            'id_kategori' => 'KTG003',
            'nama_produk' => 'Tenda Dome 4 Orang',
            'harga_sewa_perhari' => 30000,
            'stok' => 5,
            'gambar' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'id_produk' => 'PRD002',
            'id_kategori' => 'KTG003',
            'nama_produk' => 'Tenda Ultralight 2 Orang',
            'harga_sewa_perhari' => 25000,
            'stok' => 2,
            'gambar' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'id_produk' => 'PRD003',
            'id_kategori' => 'KTG001',
            'nama_produk' => 'Carier 60L',
            'harga_sewa_perhari' => 20000,
            'stok' => 3,
            'gambar' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'id_produk' => 'PRD004',
            'id_kategori' => 'KTG002',
            'nama_produk' => 'Kompor Portable',
            'harga_sewa_perhari' => 10000,
            'stok' => 8,
            'gambar' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'id_produk' => 'PRD005',
            'id_kategori' => 'KTG003',
            'nama_produk' => 'Matras Camping',
            'harga_sewa_perhari' => 8000,
            'stok' => 10,
            'gambar' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
    }
}
