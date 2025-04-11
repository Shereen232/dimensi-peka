<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orphanage extends Model
{
    protected $table = 'orphanages';

    protected $fillable = [
        'name_orphanage',
        'region',
        'address',
    ];
}

