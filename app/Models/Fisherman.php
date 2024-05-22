<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fisherman extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'age', 'phone_number', 'pesel'];

    public function hauls(): HasMany
    {
        return $this->hasMany(Haul::class);
    }

    public function users(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function relatedRecordsExist(): bool
    {
        return $this->hauls()->exists();
    }
}
