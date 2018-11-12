<?php


namespace App\Http\Controllers;


use App\DataTables\ProductsDataTable;
use App\Model\Brand;
use App\Model\Product;
use App\Traits\Crud;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    use Crud;

    public function index(Brand $brand, ProductsDataTable $dataTable)
    {
        return $dataTable->render('brands.products.index', compact('brand'));
    }

    public function create(Brand $brand)
    {
        return view('brands.products.create', compact('brand'));
    }

    public function store(Brand $brand, Request $request)
    {
        $data = $this->gatherRequest(Product::class, $request);

        $product = new Product();
        foreach ($data as $field => $value) $product->{$field} = $value;

        $product->brand()->associate($brand);
        $product->save();
    }

    public function edit(Brand $brand, Product $product)
    {
        return view('brands.products.edit', compact('brand', 'product'));
    }

    public function update(Brand $brand, Product $product, Request $request)
    {
        $data = $this->gatherRequest(Product::class, $request);

        foreach ($data as $field => $value) $product->{$field} = $value;

        $product->brand()->associate($brand);
        $product->save();
    }

    public function destroy(Brand $brand, Product $product)
    {
        try {
            $product->delete();
        } catch (\Exception $e) {
        }
    }
}
