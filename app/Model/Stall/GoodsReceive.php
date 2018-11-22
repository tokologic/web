<?php


namespace App\Model\Stall;


use App\Contract\GoodsReceiveInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Stall\GoodsReceive
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceive newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceive newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceive query()
 * @mixin \Eloquent
 */
class GoodsReceive extends Model implements GoodsReceiveInterface
{
    protected $table = 'store_goods_receives';

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
