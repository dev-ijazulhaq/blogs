<?php

namespace App\Models;

use App\Enums\BlogStatus;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    protected $casts = [
        'is_publish' => BlogStatus::class,
    ];

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function blogComments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    public function scopePublished($query)
    {
        return $query->where('is_publish', true);
    }
}
