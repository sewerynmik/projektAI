<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Haul extends Model
{
    use HasFactory;

    public function fisherman() : BelongsTo
    {
        return $this->belongsTo(Fisherman::class);
    }

    public function fish() : BelongsTo
    {
        return $this->belongsTo(Fish::class);
    }

    public function fishery() : BelongsTo
    {
        return $this->belongsTo(Fishery::class);
    }
}
