<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fish extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'species', 'description', 'image'];

    public function hauls() : HasMany
    {
        return $this->hasMany(Haul::class);
    }

    public function relatedRecordsExist(): bool
    {
        return $this->hauls()->exists();
    }
}
