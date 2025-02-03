<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    //
    use HasFactory;

    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'namaPeralatan',
        'jenis',
        'deskripsi',
        'stok',
        'harga',
        'foto'
    ];
}
