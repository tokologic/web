<?php


namespace App\Http\Controllers;


use App\DataTables\ProductsDataTable;
use App\Http\Requests\ProductRequest;
use App\Model\Product;
use App\Traits\Crud;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    use Crud;

    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('products.index');

    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $data = $this->gatherRequest(Product::class, $request);
        Product::create($data);
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));

    }

    public function update(Product $product, Request $request)
    {
        $data = $this->gatherRequest(Product::class, $request);
        $product->update($data);
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
        } catch (\Exception $e) {
        }
    }
}
