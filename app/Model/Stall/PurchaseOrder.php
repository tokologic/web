<?php


namespace App\Model\Stall;


use App\Contract\PurchaseOrderInterface;
use App\Model\Stall;
use App\PurchaseOrderItem;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Stall\PurchaseOrder
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $store_id
 * @property string $delivery_date
 * @property int $amount
 * @property string $payment_status
 * @property string $received_payment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PurchaseOrderItem[] $purchaseorderitems
 * @property-read \App\Model\Stall\Store $store
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder whereReceivedPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder whereUpdatedAt($value)
 * @property-read \App\Model\Stall $stall
 */
class PurchaseOrder extends Model implements PurchaseOrderInterface
{
    protected $table = 'store_purchase_orders';
    protected $fillable = [
        'store_id',
        'delivery_date',
        'amount',
        'payment_status',
        'received_payment'
    ];

    public function stall()
    {
        return $this->belongsTo(Stall::class, 'store_id', 'id');
    }

    public function purchaseorderitems()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }
}
