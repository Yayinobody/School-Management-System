<?php

namespace App\Enums;

enum EnrollmentStatus: string
{
    case Enrolled = 'Enrolled';
    case UnEnrolled = 'UnEnrolled';
    case Graduated = 'Graduated';
}
