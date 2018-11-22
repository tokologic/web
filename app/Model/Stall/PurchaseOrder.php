<?php


namespace App\Model\Stall;


use App\Contract\PurchaseOrderInterface;
use App\PurchaseOrderItem;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Stall\PurchaseOrder
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder query()
 * @mixin \Eloquent
 */
class PurchaseOrder extends Model implements PurchaseOrderInterface
{
    protected $table = 'store_purchase_orders';

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function purchaseorderitems()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }
}
