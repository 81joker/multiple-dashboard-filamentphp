<?php

namespace App\Enums;

enum RoleStatusEnum:string
{
    case Parent = 'parent';
    case Instructor = 'instructor';
    case Admin = 'admin';
}
