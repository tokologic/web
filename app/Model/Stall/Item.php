<?php

namespace App\Model\Stall;

use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Stall\Item
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Item query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $product_id
 * @property int $retail_price
 * @property int $average_price
 * @property int $qty
 * @property int $min
 * @property int $max
 * @property int $whole_sale_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Item whereAveragePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Item whereMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Item whereMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Item whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Item whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Item whereRetailPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Item whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Item whereWholeSalePrice($value)
 */
class Item extends Model
{
    protected $table = 'store_items';
    protected $primaryKey = 'id';
    protected $fillable = ['product_id', 'retail_price', 'average_price', 'qty', 'min', 'max', 'whole_sale_price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
