<?php


namespace App\Http\Controllers\Warehouse;


use App\DataTables\Warehouse\PODataTable;
use App\DataTables\Warehouse\POItemDataTable;
use App\Http\Controllers\Controller;
use App\Model\Warehouse\GoodsReceive as GR;
use App\Model\Warehouse\GoodsReceiveItem;
use App\Model\Warehouse\PurchaseOrder as PO;
use App\Model\Warehouse\PurchaseOrder;
use App\Model\Warehouse\PurchaseOrderItem;
use Illuminate\Http\Request;

class GoodsReceivesController extends Controller
{
    public function index(PODataTable $dataTable)
    {
//        if (!\Sentinel::hasAnyAccess(['warehouse.gr.view']))
//            abort(404);

        $page = (object)['icon' => 'fa-user-o', 'title' => 'Goods Receiving'];
        return $dataTable->with(['module' => 'gr'])
            ->render('warehouse.gr.index', compact('page')); //->with(['page' => $page]);
    }

    public function show($poId, POItemDataTable $dataTable)
    {
        $po = PO::find($poId);
        if (is_null($po->gr)) $po->gr()->create(['status' => 'new']);

        $page = (object)['icon' => 'fa-user-o', 'title' => 'Goods Receiving'];
        $items = $po->items;

        return $dataTable->with(['po' => $po])
            ->render('warehouse.gr.show', compact('po', 'page', 'items')); //->with(['gr' => $gr]);
    }

    public function dataTables($poId, Request $request)
    {
        try {
            $itemId = $request->get('item');
            $item = PurchaseOrderItem::find($itemId);

            return datatables()->of(GoodsReceiveItem::where('po_item_id', $itemId))->make(true);
        } catch (\Exception $e) {
        }
    }
}
