<?php


namespace App\Model\Warehouse;


use App\Contract\StockItemInterface;
use App\Model\Product;
use App\Model\ProductPrice;
use App\Model\Warehouse;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Stall\StockItem
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\StockItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\StockItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\StockItem query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $warehouse_id
 * @property int $product_id
 * @property int $average_price
 * @property int $qty
 * @property int $min
 * @property int $max
 * @property int $whole_sale_price
 * @property int $on_order
 * @property string $bin_location
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\StockItem whereAveragePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\StockItem whereBinLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\StockItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\StockItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\StockItem whereMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\StockItem whereMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\StockItem whereOnOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\StockItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\StockItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\StockItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\StockItem whereWarehouseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\StockItem whereWholeSalePrice($value)
 */
class StockItem extends Model implements StockItemInterface
{
    protected $table = 'stock_items';
    protected $fillable = ['warehouse_id', 'product_id', 'average_price', 'qty', 'min', 'max', 'whole_sale_price',
                           'on_order', 'bin_location'];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);

    }

    public function productPrices()
    {
        return $this->morphMany(ProductPrice::class, 'location');
    }
}
