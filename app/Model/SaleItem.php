<?php

namespace App\Model;

use App\Model\Stall\Item;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\SaleItem
 *
 * @property int $id
 * @property int $sale_id
 * @property int $store_item_id
 * @property int $unit_price
 * @property int $amount
 * @property int $qty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Stall\Item $item
 * @property-read \App\Model\Sale $sale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SaleItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SaleItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SaleItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SaleItem whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SaleItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SaleItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SaleItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SaleItem whereSaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SaleItem whereStoreItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SaleItem whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SaleItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SaleItem extends Model
{
    protected $fillable = ['qty', 'amount', 'unit_price', 'store_item_id', 'sale_id'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'store_item_id', 'id');
    }
}
