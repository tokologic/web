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

    public function saved(PurchaseOrderItem $poItem)
    {
        $po = $poItem->purchaseOrder;

        # select sum(gross_price) from po_item where po_id = x
        $sum = PurchaseOrderItem::where('po_id', '=', $po->id)->sum('gross_price');
        $amount = $sum + ($po->tax / 100 * $sum);
        $poItem->purchaseOrder()->update(['amount' => $amount]);
    }
}
