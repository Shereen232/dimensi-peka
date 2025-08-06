<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'questions';
    
    protected $fillable = ['kode', 'pertanyaan', 'kategori'];
    public $timestamps = false;
    protected $dates = ['deleted_at'];


}
