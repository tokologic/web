<?php


namespace App\Observers\Warehouse;


use App\Model\Warehouse\PurchaseOrderItem;

class PurchaseOrderItemObserver
{
    public function saving(PurchaseOrderItem $poItem)
    {
        $subTotal = (float)$poItem->qty * (float)$poItem->unit_price;
        $grossPrice = $subTotal - (((float)$poItem->discount / 100) * $subTotal);

        $poItem->sub_total = $subTotal;
        $poItem->gross_price = $grossPrice;
        $poItem->currency = 'IDR';
    }
}
