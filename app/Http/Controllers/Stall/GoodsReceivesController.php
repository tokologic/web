<?php

namespace App\Http\Controllers\Stall;

use App\DataTables\Stall\PODatatable;
use App\DataTables\Stall\POItemDataTable;
use App\Model\Stall\PurchaseOrder as PO;
use App\Http\Controllers\Controller;

class GoodsReceivesController extends Controller
{
    public function index(PODatatable $dataTable)
    {
//        if (!\Sentinel::hasAnyAccess(['stalls.gr.view']))
//            abort(404);

        $page = (object)['icon' => 'fa-user-o', 'title' => 'Goods Receiving'];
        return $dataTable->with(['module' => 'gr'])
            ->render('stalls.gr.index', compact('page')); //->with(['page' => $page]);
    }

    public function show($poId, POItemDataTable $dataTable)
    {
        $po = PO::find($poId);
        if (is_null($po->gr)) $po->gr()->create(['status' => 'new']);

        $page = (object)['icon' => 'fa-user-o', 'title' => 'Goods Receiving'];

        return $dataTable->with(['po' => $po])
            ->render('stalls.gr.show', compact('po', 'page')); //->with(['gr' => $gr]);
    }
}
