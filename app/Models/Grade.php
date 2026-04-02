<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use SoftDeletes;
    protected $fillable = ["subject_enrollment_id", "grade", "retake"];

    public function subjectEnrollment(): BelongsTo
    {
        return $this->belongsTo(SubjectEnrollment::class);
    }
}
