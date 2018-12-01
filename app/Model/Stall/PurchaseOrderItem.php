<?php

namespace App\Model\Stall;

use App\Model\Product;
use App\Model\Stall;
use Illuminate\Database\Eloquent\Model;

/**
 * App\PurchaseOrderItem
 *
 * @property int $id
 * @property int $po_id
 * @property int $product_price_id
 * @property int $qty
 * @property int $discount
 * @property string $currency
 * @property int $unit_price
 * @property int $gross_price
 * @property int $sub_total
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Stall\PurchaseOrder $purchaseorder
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem whereGrossPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem wherePoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem whereProductPriceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PurchaseOrderItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PurchaseOrderItem extends Model
{
    protected $table = 'store_po_items';
    protected $fillable = ['qty', 'unit_price', 'discount', 'sub_total','gross_price','currency'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'po_id');
    }

    public function po()
    {
        return $this->purchaseOrder();
    }
}
