<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use SoftDeletes;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($faculty) {
            $year = now()->format('Y');
            $month = now()->format('m');

                $count = self::whereYear('created_at', $year)
                             ->whereMonth('created_at', $month)
                             ->count() + 1;

                $faculty->student_number = $year . $month . str_pad($count, 3, '0', STR_PAD_LEFT);
            });
    }
    protected $fillable = [
        "user_id",
        "program_id",
        "fname",
        "mname",
        "lname",
        "gender",
        "employee_number",
        "birthday",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'Faculty_subjects')->withTimestamps();
    }
}
