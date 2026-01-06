<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'id_produk',
        'id_kategori',
        'nama_produk',
        'harga_sewa_perhari',
        'stok',
        'gambar'
    ];

public function kategori()
{
    return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
}
}
