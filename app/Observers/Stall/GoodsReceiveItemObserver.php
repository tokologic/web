<?php

namespace App\Observers\Stall;

use App\Model\Stall\GoodsReceiveItem as GRItem;
use App\Model\Stall\PurchaseOrderItem as POItem;

class GoodsReceiveItemObserver
{
    public function saved(GRItem $grItem)
    {
        $this->updateStatusGR($grItem);
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
}
