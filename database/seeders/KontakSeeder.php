<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kontak::create([
            'nama' => 'Olip',
            'nomor_telepon' => '085853247790',
            'pesan' => 'saya mau pesan',
            'status' => 'menunggu',
        ]);

        Kontak::create([
            'nama' => 'ayu',
            'nomor_telepon' => '085853232390',
            'pesan' => 'barang ready tidak',
            'status' => 'menunggu',
        ]);
    }
}
