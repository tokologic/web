<?php

namespace App\Http\Controllers\Stall;

use Illuminate\Http\Request;
use App\Model\Stall\GoodsReceiveItem as GRItem;
use App\Model\Stall\PurchaseOrder as PO;
use App\Model\Stall\PurchaseOrderItem as POItem;
use App\Http\Controllers\Controller;

class GoodsReceiveItemsController extends Controller
{
    public function dataTables($poId, Request $request)
    {
        try {
            $itemId = $request->get('item');
            return datatables()->of(GRItem::where('po_item_id', $itemId))->make(true);
        } catch (\Exception $e) {
        }
    }

    public function create($poId, Request $request)
    {
        $po = PO::find($poId);
        $poItemId = $request->get('po_item_id');
        $poItem = POItem::find($poItemId);
        return view('stalls.gr.item.create', compact('po', 'poItem'));

    }


    public function store($poId, Request $request)
    {
        $po = PO::find($poId);
        $poItemId = $request->get('po_item_id');
        $poItem = POItem::find($poItemId);

        $grItem = new GRItem();
        $grItem->qty = $request->get('qty');
        $grItem->reference = $request->get('reference');
        $grItem->gr()->associate($po->gr);
        $grItem->poItem()->associate($poItem);
        $grItem->save();
    }
}
