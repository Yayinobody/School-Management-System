<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use SoftDeletes;
    protected $fillable = ["code", "title"];

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
