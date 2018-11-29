<?php


namespace App\Observers\Warehouse;


use App\Model\Warehouse\GoodsReceive;
use App\Model\Warehouse\GoodsReceiveItem as GRItem;
use App\Model\Warehouse\PurchaseOrder;
use App\Model\Warehouse\PurchaseOrderItem as POItem;
use App\Model\Warehouse\StockItem;

class GoodsReceiveItemObserver
{
    public function saved(GRItem $grItem)
    {
        $this->updateStatusGR($grItem);
        $this->updateStockItems($grItem);
    }

    /**
     * @param GRItem $grItem
     */
    protected function updateStatusGR(GRItem $grItem): void
    {
        $countPoItem = POItem::where('po_id', $grItem->gr->po->id)->count();

        $totalQtyPoItem = POItem::where('po_id', $grItem->gr->po->id)
            ->sum('qty');

        # Distinct po item id in gr item id
        $distinctItemCount = GRItem::where('gr_id', $grItem->gr->id)
            ->distinct('po_item_id')
            ->count('po_item_id');

        $totalQtyGrItem = GRItem::where('gr_id', $grItem->gr->id)->sum('qty');

        if (($countPoItem == $distinctItemCount) and ($totalQtyPoItem == $totalQtyGrItem)) {
            $status = 'complete';
        } else {
            $status = 'on-hold';
        }

        $grItem->gr()->update(['status' => $status]);
    }

    protected function updateStockItems(GRItem $grItem)
    {
        $warehouse = $grItem->gr->po->warehouse;
        $product = $grItem->poItem->product;

        $isExist = StockItem::where('warehouse_id', $warehouse->id)->where('product_id', $product->id)->count();

        $averagePrice = POItem::where('product_id', $product->id)->avg('unit_price');
        $wsp = $averagePrice + (1/10 * $averagePrice);

        if ($isExist) {
            $stockItem = StockItem::where('warehouse_id', $warehouse->id)->where('product_id', $product->id)->first();
            $stockItem->qty = $stockItem->qty + $grItem->qty;
            $stockItem->average_price = $averagePrice;
            $stockItem->save();
        } else {
            StockItem::create([
                'warehouse_id'     => $warehouse->id,
                'product_id'       => $product->id,
                'qty'              => $grItem->qty,
                'average_price'    => $averagePrice,
                'whole_sale_price' => $wsp
            ]);
        }
    }
}
