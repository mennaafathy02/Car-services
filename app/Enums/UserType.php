<?php

namespace App\Enums;

enum UserType: string
{
    case machine = 'machine';
    case customer = 'customer';
    case admin = 'admin';
}
