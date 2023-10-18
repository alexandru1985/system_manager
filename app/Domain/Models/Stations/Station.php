<?php

namespace App\Domain\Models\Stations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Domain\Models\Companies\Company;

class Station extends Model
{  
    protected $guarded = [];

    public function company(): BelongsTo
    {
        return $this->BelongsTo(Company::class);
    }
}