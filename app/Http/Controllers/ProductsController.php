<?php


namespace App\Http\Controllers;


use Api\Transformers\ProductTransformer;
use App\DataTables\ProductsDataTable;
use App\Model\Brand;
use App\Model\Product;
use App\Model\Warehouse\PurchaseOrder;
use App\Model\Warehouse\PurchaseOrderItem;
use App\Traits\Crud;
use App\Traits\Transformer;
use Illuminate\Http\Request;
use League\Fractal\Resource\Collection;

class ProductsController extends Controller
{
    use Crud, Transformer;

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

    public function select2(Request $request)
    {
        $q = $request->get('q');
        if ($q == '')
            $products = [];
        else {

            if ($request->has('poId')) {
                $productsId = PurchaseOrderItem::where('po_id','=', $request->get('poId'))
                    ->pluck('product_id');
                $products = Product::where("name", "like", "%$q%")
                    ->whereNotIn('id', $productsId)
                    ->limit(20)
                    ->get();
            } else {
                $products = Product::where("name", "like", "%$q%")
                    ->limit(20)
                    ->get();
            }

        }


        $resource = new Collection($products, new ProductTransformer());
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
}
