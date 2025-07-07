<?php

namespace App\Enums;

enum ComplaintStatus: int
{
    case Pending = 0;
    case Reported = 1;
    case Investigated = 2;
    case Completed = 3;

    public function toString()
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Reported => 'Reported',
            self::Investigated => 'Investigated',
            self::Completed => 'Completed'
        };
    }
}
