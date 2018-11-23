<?php

namespace App\Model\Warehouse;

use App\Contract\GoodsReceiveInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Warehouse\GoodsReceive
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceive newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceive newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceive query()
 * @mixin \Eloquent
 */
class GoodsReceive extends Model implements GoodsReceiveInterface
{
    protected $table = 'warehouse_goods_receives';

    public function purchaseorder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function isQuantityFull()
    {
        // TODO: Implement isQuantityFull() method.
    }

    public function getReceivedQuantity()
    {
        // TODO: Implement getReceivedQuantity() method.
    }
}
