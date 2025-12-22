<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    protected $guarded = [];


    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
