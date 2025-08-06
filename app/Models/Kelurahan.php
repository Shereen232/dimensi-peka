<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelurahan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'kelurahan';

    protected $fillable = [
        'nama',
        'status',
    ];
    
    protected $dates = ['deleted_at'];

    public $timestamps = false;
}
