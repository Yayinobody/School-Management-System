<?php

namespace App\Models;

use App\Enums\Semester;
use App\Enums\TermStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Term extends Model
{
    protected $fillable = [
        "name",
        "school_year_id",
        "semester",
        "start_date",
        "end_date",
        "status",
    ];

    protected $casts = [
        "semester" => Semester::class,
        "start_date" => "date",
        "end_date" => "date",
        "status" => TermStatus::class,
    ];

    public function schoolYear(): BelongsTo
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
