<?php

namespace App\Enums;

enum CommendStatus: string
{
    case Draft = 'draft';
    case Approved = 'Approved';
    case Rejected = 'Rejected';
}
