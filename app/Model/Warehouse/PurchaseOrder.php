<?php


namespace App\Model\Warehouse;


use App\Contract\PurchaseOrderInterface;
use App\Model\Supplier;
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

    protected $fillable = ['user_id', 'supplier_id', 'warehouse_id', 'issuer_id',
                           'delivery_date','tax',
        'description','reference','issued_date','approved_date'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);

    }
}
