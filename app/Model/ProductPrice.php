<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ProductPrice
 *
 * @property int $id
 * @property int $product_id
 * @property int $unit_price
 * @property int|null $tax
 * @property string $location_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $location_id
 * @property float $average_price
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $location
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductPrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductPrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductPrice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductPrice whereAveragePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductPrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductPrice whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductPrice whereLocationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductPrice whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductPrice whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductPrice whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductPrice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductPrice extends Model
{
    protected $table = 'product_prices';

    protected $fillable = ['product_id', 'average_price', 'unit_price'];

    public function location()
    {
        return $this->morphTo();
    }
}
