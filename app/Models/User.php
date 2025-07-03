<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Nama tabel
    protected $table = 'users';

    // Primary key custom
    protected $primaryKey = 'id';

    // Tipe primary key (default: int, kalau UUID ganti ke string)
    public $incrementing = true;
    protected $keyType = 'int';

    // Tanggal yang di-manage otomatis oleh Laravel
    public $timestamps = false; // karena kamu pakai created_at saja (tanpa updated_at)

    protected $fillable = [
        'nik',
        'name',
        'email',
        'password',
        'umur',
        'jenis_kelamin',
        'kelurahan',
        'alamat',
        'kelas',
        'sekolah',
        'role',
        'created_at',
        'updated_at',
        'login_at',
    ];

    protected $hidden = [
        'password',
    ];

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class);
    }

}
