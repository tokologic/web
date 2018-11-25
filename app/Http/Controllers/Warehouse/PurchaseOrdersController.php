<?php


namespace App\Http\Controllers\Warehouse;

use App\DataTables\Warehouse\PODataTable;
use App\DataTables\Warehouse\POItemDataTable;
use App\Http\Controllers\Controller;
use App\Model\Supplier;
use App\Model\Warehouse;
use App\Model\Warehouse\PurchaseOrder as PO;
use App\Traits\Crud;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PurchaseOrdersController extends Controller
{
    use Crud;

    public function index(PODataTable $dataTables)
    {
        if (!\Sentinel::hasAnyAccess(['warehouse.po.view']))
            abort(404);

        return $dataTables->render('warehouse.po.index');
    }

    public function create()
    {
        if (!\Sentinel::hasAnyAccess(['warehouse.po.create']))
            abort(404);

        return view('warehouse.po.create');
    }

    public function store(Request $request)
    {
        if (!\Sentinel::hasAnyAccess(['warehouse.po.create']))
            abort(404);

        $po = new PO();
        $po->delivery_date = Carbon::parse($request->get('delivery_date'));
        $po->description = $request->get('description');
        $po->reference = $request->get('reference');
        $po->creator()->associate(\Sentinel::getUser());
        $po->supplier()->associate(Supplier::find($request->get('supplier')));
        $po->warehouse()->associate(Warehouse::find($request->get('warehouse')));

        if ($request->has('status')) $po->status = $request->get('status');

        $po->save();

        if ($request->ajax()) return route('warehouse.po.show', [$po->id]);

        return redirect()->route('warehouse.po.show', [$po->id]);
    }

    public function edit($id, Request $request)
    {
        if (!\Sentinel::hasAnyAccess(['warehouse.po.update']))
            abort(404);

        $po = PO::find($id);

        return view('warehouse.po.edit', compact('po'));

    }

    public function update($id, Request $request)
    {
        if (!\Sentinel::hasAnyAccess(['warehouse.po.update']))
            abort(404);
    }

    public function show($id, POItemDataTable $dataTable)
    {
        if (!\Sentinel::hasAnyAccess(['warehouse.po.view']))
            abort(404);

        $po = PO::find($id);

        return $dataTable->with('po', $po)
            ->render('warehouse.po.show', compact('po'));
    }

    public function status($id, Request $request)
    {
        if (!\Sentinel::hasAnyAccess(['warehouse.po.update']))
            abort(404);

        $status = $request->get('status');
        $po = PO::find($id);
        $po->status = $status;
        $po->save();

        if ($request->ajax()) return route('warehouse.po.show', $po->id);
    }
}
