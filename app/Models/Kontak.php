<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;



class Kontak extends Model
{
    use HasFactory;
    protected $table = 'kontak';
    protected $fillable = [
        'nama',
        'nomor_telepon',
        'pesan',
        'status'
    ];
}
