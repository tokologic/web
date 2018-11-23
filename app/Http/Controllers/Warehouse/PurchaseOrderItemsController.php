<?php


namespace App\Http\Controllers\Warehouse;


use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Warehouse\PurchaseOrder;
use App\Model\Warehouse\PurchaseOrderItem;
use Illuminate\Http\Request;

class PurchaseOrderItemsController extends Controller
{
    public function create($id)
    {
        $po = PurchaseOrder::find($id);
        return view('warehouse.item.create', compact('po'));
    }

    public function store($id, Request $request)
    {
        $po = PurchaseOrder::find($id);
        $product = Product::find($request->get('product'));

        $poItem = new PurchaseOrderItem;
        $poItem->qty = $request->get('qty');
        $poItem->unit_price = $request->get('unit_price');
        $poItem->discount = $request->get('discount');
        $poItem->product()->associate($product);
        $poItem->purchaseOrder()->associate($po);
        $poItem->save();
    }
}
