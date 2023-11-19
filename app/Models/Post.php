<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Base
{

    protected $fillable = [
        'title', 'slug', 'content', 'user_id', 'category', 'tag', 'created_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
