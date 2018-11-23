<?php

namespace App\Model\Warehouse;

use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

class SupplierProduct extends Model
{
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
