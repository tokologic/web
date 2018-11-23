<?php

namespace App\Model\Warehouse;

use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    protected $table = 'warehouse_po_items';

    protected $fillable = ['qty', 'unit_price', 'discount',
                           'sub_total','gross_price','currency'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'po_id');
    }
}
