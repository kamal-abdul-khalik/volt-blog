<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getReadingTime()
    {
        $mins = round(str_word_count($this->content) / 250);
        return ($mins < 1) ? 1 : $mins;
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured',  true);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
