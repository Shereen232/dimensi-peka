<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['kode', 'pertanyaan', 'kategori'];
    public $timestamps = false;
}
