<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;
use Carbon\Carbon;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id_pembayaran' => 'PAY-0001',
                'nama_penyewa' => 'Asep',
                'no_hp' => '081234567890',
                'total_bayar' => 350000,
                'metode_bayar' => 'Transfer',
                'status' => 'pending',
                'tanggal_bayar' => Carbon::now()->subDays(2),
                'keterangan' => 'Menunggu konfirmasi admin',
            ],
            [
                'id_pembayaran' => 'PAY-0002',
                'nama_penyewa' => 'Ayu',
                'no_hp' => '082233445566',
                'total_bayar' => 500000,
                'metode_bayar' => 'Cash',
                'status' => 'diterima',
                'tanggal_bayar' => Carbon::now()->subDay(),
                'keterangan' => 'Pembayaran diterima',
            ],
              [
                'id_pembayaran' => 'PAY-0003',
                'nama_penyewa' => 'Budi Santoso',
                'no_hp' => '08973832642442',
                'total_bayar' => 400000,
                'metode_bayar' => 'Cash',
                'status' => 'diterima',
                'tanggal_bayar' => Carbon::now()->subDay(),
                'keterangan' => 'Pembayaran diterima',
            ],
            [
                'id_pembayaran' => 'PAY-0004',
                'nama_penyewa' => 'Tom Holland',
                'no_hp' => '085677889900',
                'total_bayar' => 275000,
                'metode_bayar' => 'Transfer',
                'status' => 'ditolak',
                'tanggal_bayar' => Carbon::now(),
                'keterangan' => 'Bukti transfer tidak valid',
            ],
        ];

        foreach ($data as $item) {
            Pembayaran::updateOrCreate(
                ['id_pembayaran' => $item['id_pembayaran']],
                $item
            );
        }
    }
}
