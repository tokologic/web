<?php

namespace App;

use App\Model\Stall\PurchaseOrder;
use App\Model\Stall\Store;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    protected $table = 'store_po_items';

    public function purchaseorder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
}
