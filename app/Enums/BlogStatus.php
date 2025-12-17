<?php

namespace App\Enums;

enum BlogStatus: int
{
    case PENDING = 0;
    case PUBLISH = 1;

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::PUBLISH => 'Publish'
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'bg-warning',
            self::PUBLISH => 'bg-success'
        };
    }
}
