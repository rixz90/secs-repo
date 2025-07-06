<?php

namespace App\Enums;

enum ComplaintStatus: int
{
    case Pending = 0;
    case Process = 1;
    case Review = 2;
    case Completed = 3;

    public function toString()
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Process => 'Process',
            self::Review => 'Review',
            self::Completed => 'Completed'
        };
    }
}
