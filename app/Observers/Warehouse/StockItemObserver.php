<?php


namespace App\Observers\Warehouse;


use App\Model\ProductPrice;
use App\Model\Warehouse\StockItem;

class StockItemObserver
{
    public function created(StockItem $stockItem)
    {
        $stockItem->productPrices()->create([
            'product_id'    => $stockItem->product_id,
            'unit_price'    => $stockItem->whole_sale_price,
            'average_price' => $stockItem->average_price
        ]);
    }

    public function updated(StockItem $stockItem)
    {
        $productPrices = $stockItem->productPrices()
            ->where('average_price', $stockItem->average_price)
            ->first();

//        dd($productPrices);
    }
}
