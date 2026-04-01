<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    protected $fillable = [
        "program_id",
        "code",
        "title",
        "description",
        "lecture",
        "lab",
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    public function curriculum(): BelongsTo
    {
        return $this->belongsTo(Curriculum::class);
    }

    public function program(): BelongsToMany
    {
        return $this->belongsToMany(Program::class, 'program_subjects')->withTimestamps();
    }

    public function faculties(): BelongsToMany
    {
        return $this->belongsToMany(Faculty::class, 'Faculty_subjects')->withTimestamps();
    }
}
