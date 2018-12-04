<?php

namespace App\Http\Controllers\Stall;

use App\DataTables\Stall\PODatatable;
use App\DataTables\Stall\POItemDataTable;
use App\Http\Controllers\Controller;
use App\Model\Stall\PurchaseOrder as PO;
use App\Http\Requests\Stall\PORequest;
use App\Model\Stall;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $po = new PO();
        $po->store_id = $request->get('store_id');
        $po->delivery_date = Carbon::parse($request->get('delivery_date'));
        $po->amount = 0;
        $po->payment_status = 'pending';
        $po->received_payment = false;
        $po->save();

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

    public function confirmPayment($id, POItemDataTable $dataTable)
    {
        $po = PO::find($id);
        $po->payment_status = 'confirmed';
        $po->save();

        $po = PO::find($id);
        return redirect()->route('stalls.po.index');
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
