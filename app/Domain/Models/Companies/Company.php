<?php

namespace App\Domain\Models\Companies;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Models\Stations\Station;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{ 
    protected $guarded = [];

    public function station(): HasMany
    {
        return $this->hasMany(Station::class);
    }
}