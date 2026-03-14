<?php

namespace App\Enums;

enum EnrollmentStatus: string
{
    case Enrolled = 'enrolled';
    case UnEnrolled = 'unenrolled';
    case Graduated = 'graduated';
}
