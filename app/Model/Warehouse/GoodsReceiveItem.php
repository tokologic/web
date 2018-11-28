<?php

namespace App\Model\Warehouse;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Warehouse\GoodsReceiveItem
 *
 * @property int $id
 * @property int $gr_id
 * @property int $product_id
 * @property int $qty
 * @property string $reference
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceiveItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceiveItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceiveItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceiveItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceiveItem whereGrId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceiveItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceiveItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceiveItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceiveItem whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\GoodsReceiveItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GoodsReceiveItem extends Model
{
    protected $table = 'warehouse_gr_items';
    protected $fillable = ['qty', 'reference'];

    public function goodsReceive()
    {
        return $this->belongsTo(GoodsReceive::class, 'gr_id');
    }

    public function gr()
    {
        return $this->goodsReceive();
    }

    public function purchaseOrderItem()
    {
        return $this->belongsTo(PurchaseOrderItem::class, 'po_item_id');
    }

    public function poItem()
    {
        return $this->purchaseOrderItem();
    }
}
