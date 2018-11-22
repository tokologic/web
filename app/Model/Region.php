<?php

namespace App\Model;

use App\Model\Stall\Store;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
