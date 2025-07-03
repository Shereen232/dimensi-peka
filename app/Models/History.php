<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'histories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'action_type',
        'table_name',
        'record_id',
        'old_data',
        'new_data',
        'ip_address',
        'user_agent',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'old_data' => 'array', // Cast to array to easily work with JSON data
        'new_data' => 'array', // Cast to array to easily work with JSON data
    ];

    /**
     * Get the user that owns the history record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}