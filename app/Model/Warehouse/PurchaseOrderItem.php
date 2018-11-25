<?php

namespace App\Model\Warehouse;

use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Warehouse\PurchaseOrderItem
 *
 * @property int $id
 * @property int $po_id
 * @property int $product_id
 * @property int $discount
 * @property string $currency
 * @property int $unit_price
 * @property int $sub_total
 * @property int $gross_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $qty
 * @property-read \App\Model\Product $product
 * @property-read \App\Model\Warehouse\PurchaseOrder $purchaseOrder
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem whereGrossPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem wherePoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrderItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PurchaseOrderItem extends Model
{
    protected $table = 'warehouse_po_items';

    protected $fillable = ['qty', 'unit_price', 'discount',
                           'sub_total','gross_price','currency'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'po_id');
    }

    /**
     * Alias of purchaseOrder method
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function po()
    {
        return $this->purchaseOrder();
    }
}
