<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Posts extends Model
{
    use HasFactory;

    protected $filleble = ['user_id', 'title', 'body', 'slug', 'is_publish'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function slug()
    {
        return 'slug';
    }
}
