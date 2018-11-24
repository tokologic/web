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
}
