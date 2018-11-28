<?php


namespace App\Http\Controllers\Warehouse;


use App\Http\Controllers\Controller;
use App\Model\Warehouse\GoodsReceiveItem as GRItem;
use App\Model\Warehouse\PurchaseOrder as PO;
use App\Model\Warehouse\PurchaseOrderItem as POItem;
use Illuminate\Http\Request;

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
        return view('warehouse.gr.item.create', compact('po', 'poItem'));

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
