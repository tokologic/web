<?php

namespace App\Model;

use App\Model\Stall\Item;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
