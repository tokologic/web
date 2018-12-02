<?php

namespace App\Http\Controllers\Sale;

use App\Model\Product;
use App\Model\Sale;
use App\Model\SaleItem;
use App\Model\Stall\Item;
use App\Traits\Crud;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaleItemController extends Controller
{
    use Crud;

    public function create($saleitemid)
    {
        $sale_item = Sale::find($saleitemid);
        $stallItems = Item::all();

        return view('sale.item.create', compact('sale_item', 'stallItems'));
    }

    public function store($sale_item_id, Request $request)
    {
        $saleItem = new SaleItem();
        $saleItem->qty = $request->get('qty');
        $saleItem->unit_price = $request->get('unit_price');
        $saleItem->amount = $request->get('amount');
        $saleItem->sale_id = $sale_item_id;
        $saleItem->store_item_id = $request->get('store_item_id');
        $saleItem->save();
    }

    public function edit($saleitem_id)
    {
        $saleitem = SaleItem::find($saleitem_id);
        $stallItems = Item::all();
        return view('sale.item.edit', compact('saleitem', 'stallItems'));
    }

    public function update($id, Request $request)
    {
        $sale_item = SaleItem::find($id);

        $sale_item->store_item_id = $request->get('store_item_id');
        $sale_item->unit_price = $request->get("unit_price");
        $sale_item->amount = $request->get('amount');
        $sale_item->qty = $request->get('qty');
        $sale_item->save();
    }

    public function destroy($saleitem)
    {
//        if (!\Sentinel::hasAnyAccess(['warehouse.po.item.delete']))
//            abort(404);

        try {
            $item = SaleItem::find($saleitem);
            $item->delete();
        } catch (\Exception $e) {
        }
    }
}
