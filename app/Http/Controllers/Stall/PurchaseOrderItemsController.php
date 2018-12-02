<?php

namespace App\Http\Controllers\Stall;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stall\POItemRequest;
use App\Model\Product;
use App\Model\Stall\PurchaseOrder;
use App\Model\Stall\PurchaseOrderItem;
use Illuminate\Http\Request;

class PurchaseOrderItemsController extends Controller
{
    public function create($poId)
    {
//        if (!\Sentinel::hasAnyAccess(['warehouse.po.item.create']))
//            abort(404);

        $po = PurchaseOrder::find($poId);
        return view('stalls.po.item.create', compact('po'));
    }

    public function store($poId, POItemRequest $request)
    {
//        if (!\Sentinel::hasAnyAccess(['warehouse.po.item.create']))
//            abort(404);
        $po = PurchaseOrder::find($poId);
        $product = Product::find($request->get('product'));

        $poItem = new PurchaseOrderItem;
        $poItem->qty = $request->get('qty');
        $poItem->unit_price = $request->get('unit_price');
        $poItem->discount = $request->get('discount');
        $poItem->product()->associate($product);
        $poItem->purchaseOrder()->associate($po);
        $poItem->save();
    }

    public function edit($poId, $itemId)
    {
//        if (!\Sentinel::hasAnyAccess(['warehouse.po.item.edit']))
//            abort(404);

        $item = PurchaseOrderItem::find($itemId);
        return view('stalls.po.item.edit', compact('item'));
    }

    public function update($poId, $itemId, Request $request)
    {
//        if (!\Sentinel::hasAnyAccess(['warehouse.po.item.edit']))
//            abort(404);

        $product = Product::find($request->get('product'));

        $poItem = PurchaseOrderItem::find($itemId);
        $poItem->qty = $request->get('qty');
        $poItem->unit_price = $request->get('unit_price');
        $poItem->discount = $request->get('discount');
        $poItem->product()->associate($product);
        $poItem->save();
    }

    public function destroy($poId, $itemId)
    {
//        if (!\Sentinel::hasAnyAccess(['warehouse.po.item.delete']))
//            abort(404);

        try {
            $item = PurchaseOrderItem::find($itemId);
            $item->delete();
        } catch (\Exception $e) {
        }
    }
}

