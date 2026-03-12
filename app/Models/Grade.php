<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    protected $fillable = ["subject_enrollment_id", "grade", "retake"];

    public function subjectEnrollment(): BelongsTo
    {
        return $this->belongsTo(SubjectEnrollment::class);
    }
}
