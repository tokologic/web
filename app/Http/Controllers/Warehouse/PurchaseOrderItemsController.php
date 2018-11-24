<?php


namespace App\Http\Controllers\Warehouse;


use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Warehouse\PurchaseOrder;
use App\Model\Warehouse\PurchaseOrderItem;
use Illuminate\Http\Request;

class PurchaseOrderItemsController extends Controller
{
    public function create($poId)
    {
        $po = PurchaseOrder::find($poId);
        return view('warehouse.item.create', compact('po'));
    }

    public function store($poId, Request $request)
    {
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
        $item = PurchaseOrderItem::find($itemId);
        return view('warehouse.item.edit', compact('item'));
    }

    public function update($poId, $itemId, Request $request)
    {

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
        try {
            $item = PurchaseOrderItem::find($itemId);
            $item->delete();
        } catch (\Exception $e) {
        }
    }
}
