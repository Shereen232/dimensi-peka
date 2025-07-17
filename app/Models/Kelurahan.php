<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'kelurahan'; // Nama tabel di database

    protected $fillable = [
        'nama', // Kolom yang dapat diisi massal
    ];

    public $timestamps = false; // Matikan timestamps jika tidak menggunakan created_at dan updated_at
}
