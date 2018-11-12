<?php


namespace App\Http\Controllers;


use App\DataTables\ProductsDataTable;
use App\Model\Product;
use App\Model\ProductVariant;
use App\Traits\Crud;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    use Crud;

    public function index(Product $product, ProductsDataTable $dataTable)
    {
        return $dataTable->render('products.variants.index', compact('product'));
    }

    public function create(Product $product)
    {
        return view('products.variants.create', compact('product'));
    }

    public function store(Product $product, Request $request)
    {
        $data = $this->gatherRequest(ProductVariant::class, $request);

        $variant = new ProductVariant();
        foreach ($data as $field => $value) $variant->{$field} = $value;

        $variant->product()->associate($product);
        $variant->save();
    }

    public function edit(Product $product, ProductVariant $variant)
    {
        return view('products.variants.edit', compact('product', 'variant'));
    }

    public function update(Product $product, ProductVariant $variant, Request $request)
    {
        $data = $this->gatherRequest(ProductVariant::class, $request);

        foreach ($data as $field => $value) $variant->{$field} = $value;

        $variant->product()->associate($product);
        $variant->save();
    }

    public function destroy(Product $product, ProductVariant $variant)
    {
        try {
            $variant->delete();
        } catch (\Exception $e) {
        }
    }
}
