<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans'; 
    protected $primaryKey = 'id_pembayaran';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_pembayaran',   // 🔥 WAJIB DITAMBAHKAN
        'nama_penyewa',
        'no_hp',
        'total_bayar',
        'metode_bayar',
        'tanggal_bayar',
        'status',
        'keterangan'
    ];
}
