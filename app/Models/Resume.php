<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resume extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'file_path',
        'is_active',
        'notify_user',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'notify_user' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
