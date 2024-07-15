<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags'; // Ensure this is correct
    protected $fillable  = ['name'];
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Posts::class, relatedPivotKey: 'tag_id');
    }
}
