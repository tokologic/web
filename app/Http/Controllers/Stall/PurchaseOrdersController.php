<?php

namespace App\Http\Controllers\Stall;

use App\DataTables\Stall\PODatatable;
use App\DataTables\Stall\POItemDataTable;
use App\Http\Controllers\Controller;
use App\Model\Stall\PurchaseOrder as PO;
use App\Http\Requests\Stall\PORequest;
use App\Model\Stall;
use Carbon\Carbon;

class PurchaseOrdersController extends Controller
{
    public function index(PODatatable $dataTable)
    {
        return $dataTable->render('stalls.po.index');
    }

    public function create()
    {
        $stalls = Stall::all();
        return view('stalls.po.create', compact('stalls'));
    }

    public function store(PORequest $request)
    {
        $po = new PO();
        $request['delivery_date'] = Carbon::parse($request->get('delivery_date'));
        $request['payment_status'] = 'pending';
        $request['received_payment'] = 'pending';
        $po->create($request->all());

        if ($request->ajax()) return route('stalls.po.show', [$po->id]);

        return redirect()->route('stalls.po.show', [$po->id]);
    }

    public function edit($id)
    {
        //
    }

    public function show($id, POItemDataTable $dataTable)
    {
        $po = PO::find($id);

        return $dataTable->with('po', $po)
            ->render('stalls.po.show', compact('po'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
