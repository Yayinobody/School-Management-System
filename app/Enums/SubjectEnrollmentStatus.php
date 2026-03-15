<?php

namespace App\Enums;

enum SubjectEnrollmentStatus: string
{
    case Enrolled = 'Enrolled';
    case Failed = 'Failed';
    case Drop = 'Drop';
    case Incomplete = 'Incomplete';
}
