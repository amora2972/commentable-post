<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_name', 'text', 'parent_id'];

    function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }
}
