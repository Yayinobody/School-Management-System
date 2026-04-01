<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    protected $fillable = ["name", "college_id", "capacity"];

    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class);
    }
}
