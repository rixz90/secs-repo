<?php

namespace App\Enums;

enum ComplaintStatus: int
{
    case Pending = 0;
    case Process = 1;
    case Review = 2;
    case Completed = 3;
}
