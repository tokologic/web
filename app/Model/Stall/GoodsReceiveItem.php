<?php

namespace App\Model\Stall;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Stall\GoodsReceiveItem
 *
 * @property int $id
 * @property int $gr_id
 * @property int $product_id
 * @property int $qty
 * @property string $reference
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Stall\GoodsReceive $goodsreceive
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceiveItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceiveItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceiveItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceiveItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceiveItem whereGrId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceiveItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceiveItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceiveItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceiveItem whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\GoodsReceiveItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GoodsReceiveItem extends Model
{
    protected $table = 'store_gr_items';

    public function goodsreceive()
    {
        return $this->belongsTo(GoodsReceive::class);
    }
}
