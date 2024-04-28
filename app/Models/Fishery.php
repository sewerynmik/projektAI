<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fishery extends Model
{
    use HasFactory;

    public function hauls(): HasMany
    {
        return $this->hasMany(Haul::class);
    }
}
