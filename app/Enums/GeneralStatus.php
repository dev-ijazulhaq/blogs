<?php

namespace App\Enums;

enum GeneralStatus: int
{
    case ACTIVE = 1;
    case DISABLE = 0;


    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::DISABLE => 'Disable'
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::ACTIVE => 'bg-success',
            self::DISABLE => 'bg-warning'
        };
    }
}
