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

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }
}
