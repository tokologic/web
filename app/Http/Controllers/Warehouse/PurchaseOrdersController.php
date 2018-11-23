<?php


namespace App\Http\Controllers\Warehouse;

use App\DataTables\Warehouse\PODataTables;
use App\Http\Controllers\Controller;
use App\Model\Warehouse\PurchaseOrder;
use App\Traits\Crud;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PurchaseOrdersController extends Controller
{
    use Crud;

    public function index(PODataTables $dataTables)
    {
        return $dataTables->render('warehouse.po.index');
    }

    public function create()
    {
        return view('warehouse.po.create');
    }

    public function store(Request $request)
    {
        $data = $this->gatherRequest(PurchaseOrder::class, $request);
        PurchaseOrder::create([
            'user_id' => \Sentinel::getUser()->id,
            'supplier_id' => $request->get('supplier'),
            'warehouse_id' => $request->get('warehouse'),
            'delivery_date' => Carbon::parse($request->get('delivery_date'))
        ]);
    }

    public function edit($id, Request $request)
    {
        
    }
}
