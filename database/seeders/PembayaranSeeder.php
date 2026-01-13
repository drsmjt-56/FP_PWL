<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;
use Carbon\Carbon;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        Pembayaran::insert([
            [
                'id_pembayaran' => 'PAY-0001',
                'nama_penyewa' => 'Andi Saputra',
                'no_hp' => '081234567890',
                'total_bayar' => 350000,
                'metode_bayar' => 'Transfer',
                'status' => 'pending',
                'tanggal_bayar' => Carbon::now()->subDays(2),
                'keterangan' => 'Menunggu konfirmasi admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pembayaran' => 'PAY-0002',
                'nama_penyewa' => 'Budi Santoso',
                'no_hp' => '082233445566',
                'total_bayar' => 500000,
                'metode_bayar' => 'Cash',
                'status' => 'diterima',
                'tanggal_bayar' => Carbon::now()->subDay(),
                'keterangan' => 'Pembayaran diterima',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pembayaran' => 'PAY-0003',
                'nama_penyewa' => 'Citra Lestari',
                'no_hp' => '085677889900',
                'total_bayar' => 275000,
                'metode_bayar' => 'Transfer',
                'status' => 'ditolak',
                'tanggal_bayar' => Carbon::now(),
                'keterangan' => 'Bukti transfer tidak valid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
