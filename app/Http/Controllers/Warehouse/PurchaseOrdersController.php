<?php


namespace App\Http\Controllers\Warehouse;

use App\DataTables\Warehouse\PODataTable;
use App\DataTables\Warehouse\POItemDataTable;
use App\Http\Controllers\Controller;
use App\Model\Warehouse\PurchaseOrder;
use App\Traits\Crud;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PurchaseOrdersController extends Controller
{
    use Crud;

    public function index(PODataTable $dataTables)
    {
        return $dataTables->render('warehouse.po.index');
    }

    public function create()
    {
        return view('warehouse.po.create');
    }

    public function store(Request $request)
    {
//        $data = $this->gatherRequest(PurchaseOrder::class, $request);
        $po = PurchaseOrder::create([
            'user_id'       => \Sentinel::getUser()->id,
            'supplier_id'   => $request->get('supplier'),
            'warehouse_id'  => $request->get('warehouse'),
            'delivery_date' => Carbon::parse($request->get('delivery_date')),
            'description'   => $request->get('description'),
            'reference'     => $request->get('reference'),
        ]);

        return redirect()->route('warehouse.po.edit', [$po->id]);
    }

    public function edit($id, Request $request)
    {
        $po = PurchaseOrder::find($id);

        return view('warehouse.po.edit', compact('po'));

    }

    public function show($id, POItemDataTable $dataTable)
    {
        $po = PurchaseOrder::find($id);

        return $dataTable->with('po', $po)
            ->render('warehouse.po.show', compact('po'));
    }
}
