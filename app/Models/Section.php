<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    protected $fillable = [
        "subject_id",
        "faculty_id",
        "room_id",
        "term_id",
        "section_code",
        "time_start",
        "time_end",
        "max_slots",
        "status",
    ];


    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function term(): HasOne
    {
        return $this->hasOne(Term::class);
    }

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function subjectEnrollment(): HasMany
    {
        return $this->hasMany(SubjectEnrollment::class);
    }

    public function sectionDays(): HasOne
    {
        return $this->hasMany(SectionDay::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
