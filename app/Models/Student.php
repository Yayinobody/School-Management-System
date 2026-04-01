<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $year = now()->format('Y');
            $month = now()->format('m');

                $count = self::whereYear('created_at', $year)
                             ->whereMonth('created_at', $month)
                             ->count() + 1;

                $student->student_number = $year . $month . str_pad($count, 3, '0', STR_PAD_LEFT);
            });
    }
    protected $fillable = [
        "user_id",
        "fname",
        "mname",
        "lname",
        "gender",
        "student_number",
        "year_level",
        "birthday",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subjectEnrollments(): HasMany
    {
        return $this->hasMany(SubjectEnrollment::class);
    }

    public function enrollment(): HasOne
    {
        return $this->hasOne(Enrollment::class);
    }

}
