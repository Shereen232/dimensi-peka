<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';

    protected $fillable = [
        'evaluation_process',
        'evaluation_result',
        'id_orphanage',
        'id_user',
    ];
}
