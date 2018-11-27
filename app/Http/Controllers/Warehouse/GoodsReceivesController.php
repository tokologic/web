<?php


namespace App\Http\Controllers\Warehouse;


use App\DataTables\Warehouse\PODataTable;
use App\DataTables\Warehouse\POItemDataTable;
use App\Http\Controllers\Controller;
use App\Model\Warehouse\GoodsReceive as GR;
use App\Model\Warehouse\PurchaseOrder as PO;

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

    public function show($id, POItemDataTable $dataTable)
    {
        $po = PO::find($id);
        if (is_null($po->gr)) $po->gr()->create(['status' => 'new']);

        $page = (object)['icon' => 'fa-user-o', 'title' => 'Goods Receiving'];
        return $dataTable->with(['po' => $po])
            ->render('warehouse.gr.show', compact('po', 'page')); //->with(['gr' => $gr]);
    }
}
