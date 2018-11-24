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
 * @property int $id
 * @property int $po_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Stall\PurchaseOrder $purchaseorder
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceive whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceive whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceive wherePoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceive whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceive whereUpdatedAt($value)
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
