<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaraSewa extends Model
{
    protected $fillable = [
        'langkah',
        'judul',
        'deskripsi'
    ];
}
