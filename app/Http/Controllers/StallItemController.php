<?php

namespace App\Http\Controllers;

use App\DataTables\StallItemDataTable;
use App\Http\Requests\StallItemRequest;
use App\Model\Product;
use App\Model\Stall\Item;
use App\Traits\Crud;

class StallItemController extends Controller
{
    use Crud;

    public function index(StallItemDataTable $dataTable)
    {
        $page = (object)['icon' => 'fa-bold', 'title' => 'Stall Items'];
        return $dataTable->render('stalls.item.index', compact('page'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stalls.item.create', compact('products'));
    }

    public function store(StallItemRequest $request)
    {
        $data = $this->gatherRequest(Item::class, $request);

        $brand = new Item();
        $brand->create($data);
    }

    public function edit(Product $item)
    {
        $products = Product::all();
        return view('stalls.item.edit', compact('item', 'products'));
    }

    public function update(Item $item, StallItemRequest $request)
    {
        $data = $this->gatherRequest(Item::class, $request);
        $item->update($data);
    }

    public function destroy(Item $item)
    {
        try {
            $item->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
