<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SectionDay extends Model
{
    protected $fillable = ["section_id", "day"];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
