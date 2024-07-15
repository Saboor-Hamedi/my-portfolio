<?php

namespace App\Models;

use Illuminate\Cache\TagSet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts'; // Ensure this is correct
    protected $filleble = ['user_id', 'title', 'body', 'slug', 'image', 'is_publish'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'post_id');
    }

    public function slug()
    {
        return 'slug';
    }
    public function wrapBodyText($length = 50, $preserveNewlines = false)
    {
        $paragraphs = collect(explode("\n\n", $this->body))
            ->map(function ($paragraph) use ($length, $preserveNewlines) {
                // Capitalize the first letter only if not already a sentence starter
                $paragraph = preg_replace('/^([a-z])/', strtoupper('\\1'), $paragraph, 1);

                // Word wrap using HTML line breaks (<br />)
                $wrapped = wordwrap($paragraph, $length, '<br />', true);

                // Optionally preserve newlines within paragraphs
                if ($preserveNewlines) {
                    $wrapped = nl2br($wrapped);
                }

                return $wrapped;
            })
            ->toArray();

        return implode("<br />\n\n", $paragraphs);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->images);
    }
}
