<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'id_kategori' => 'KTG001',
            'nama_kategori' => 'Hiking',
            'status' => 'tersedia',
        ]);
        Kategori::create([
            'id_kategori' => 'KTG002',
            'nama_kategori' => 'Cooking',
            'status' => 'tersedia',
        ]);
        Kategori::create([
            'id_kategori' => 'KTG003',
            'nama_kategori' => 'Camping',
            'status' => 'tersedia',
        ]);
    }
}
