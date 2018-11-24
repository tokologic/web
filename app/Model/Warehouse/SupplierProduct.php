<?php

namespace App\Model\Warehouse;

use App\Model\Product;
use App\Model\Supplier;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Warehouse\SupplierProduct
 *
 * @property int $product_id
 * @property int $supplier_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Product $product
 * @property-read \App\Model\Supplier $supplier
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\SupplierProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\SupplierProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\SupplierProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\SupplierProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\SupplierProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\SupplierProduct whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\SupplierProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
