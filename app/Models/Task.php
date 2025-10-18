<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tasks';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'priority',
        'due_date',
        'is_completed'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
