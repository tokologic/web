<?php


namespace App\Http\Controllers;


use App\DataTables\StockDataTable;
use App\Model\Warehouse;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    public function index($warehouseId, StockDataTable $dataTable)
    {
        $page = (object)['icon' => 'fa-user-o', 'title' => 'Stock Item'];
        return $dataTable->with(['warehouse' => Warehouse::find($warehouseId)])
            ->render('stocks.index', compact('page'));
    }

    public function edit($warehouseId, $stockId)
    {
        $warehouse = Warehouse::find($warehouseId);
        $stock = $warehouse->stocks()->find($stockId);

        return view('stocks.edit', compact('warehouse', 'stock'));
    }

    /**
     * @param $warehouseId
     * @param $stockId
     * @param Request $request
     */
    public function update($warehouseId, $stockId, Request $request)
    {
        $wh = Warehouse::find($warehouseId);
        $si = $wh->stocks()->find($stockId);

        $si->min = $request->get('min');
        $si->max = $request->get('max');
        $si->whole_sale_price = $request->get('whole_sale_price');
        $si->bin_location = $request->get('bin_location');
        $si->save();
    }

}
