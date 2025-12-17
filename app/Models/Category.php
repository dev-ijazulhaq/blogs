<?php

namespace App\Models;

use App\Enums\GeneralStatus;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    protected $casts = [
        'status' => GeneralStatus::class,
    ];
}
