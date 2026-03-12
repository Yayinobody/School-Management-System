<?php

namespace App\Enums;

enum EnrollmentStatus: string
{
    case Enrolled = 'enrolled';
    case Failed = 'failed';
    case Drop = 'drop';
    case Incomplete = 'incomplete';
}
