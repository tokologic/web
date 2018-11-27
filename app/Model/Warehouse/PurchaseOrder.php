<?php


namespace App\Model\Warehouse;


use App\Contract\PurchaseOrderInterface;
use App\Model\Supplier;
use App\Model\User;
use App\Model\Warehouse;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Stall\PurchaseOrder
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\PurchaseOrder query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $supplier_id
 * @property int $warehouse_id
 * @property int|null $approver_id
 * @property int|null $issuer_id
 * @property string|null $approved_date
 * @property string|null $issued_date
 * @property string $delivery_date
 * @property int|null $tax
 * @property string $description
 * @property string|null $reference
 * @property string $status
 * @property int $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\User|null $approver
 * @property-read \App\Model\User $creator
 * @property-read \App\Model\User|null $issuer
 * @property-read \App\Model\Supplier $supplier
 * @property-read \App\Model\Warehouse $warehouse
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereApprovedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereApproverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereIssuedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereIssuerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse\PurchaseOrder whereWarehouseId($value)
 */
class PurchaseOrder extends Model implements PurchaseOrderInterface
{
    protected $table = 'warehouse_purchase_orders';

    protected $fillable = ['delivery_date', 'tax',
                           'description', 'reference', 'issued_date', 'approved_date', 'amount'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function issuer()
    {
        return $this->belongsTo(User::class, 'issuer_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function goodsReceive()
    {
        return $this->hasOne(GoodsReceive::class, 'po_id');
    }

    public function gr()
    {
        return $this->goodsReceive();
    }
}
