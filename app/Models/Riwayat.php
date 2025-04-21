<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'riwayat';

    protected $fillable = [
        'user_id',
        'tanggal',
        'skor_es',
        'hasil_es',
        'skor_cp',
        'hasil_cp',
        'skor_h',
        'hasil_h',
        'skor_p',
        'hasil_p',
        'skor_pro',
        'hasil_pro',
        'total_kesulitan',
        'hasil_total',
    ];

    protected $dates = ['tanggal', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
