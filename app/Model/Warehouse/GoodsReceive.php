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
 * @property int $id
 * @property int $po_id
 * @property int $approver_id
 * @property int $approved_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Warehouse\PurchaseOrder $purchaseorder
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceive whereApprovedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceive whereApproverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceive whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceive whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceive wherePoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceive whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceive whereUpdatedAt($value)
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
