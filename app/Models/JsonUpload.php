<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JsonUpload extends Model
{
    protected $fillable = [
        'user_id',
        'file_name',
        'path',
        'status',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function casts(): array
    {
        return [
            'status' => 'boolean',
            'created_at' => 'datetime',
        ];
    }
}
