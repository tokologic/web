<?php


namespace App\Http\Controllers;


use Api\Transformers\ProductTransformer;
use App\DataTables\ProductsDataTable;
use App\Http\Requests\ProductRequest;
use App\Model\Brand;
use App\Model\Category;
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
        $title = 'Product by '.$brand->name.' brand.';
        $page = (object)['icon' => 'fa-product-hunt', 'title' => $title];
        return $dataTable->with('brand_id', $brand->id)
            ->render('brands.products.index', compact('brand', 'page'));
    }

    public function create(Brand $brand)
    {
        $categories = Category::all();
        return view('brands.products.create', compact('brand', 'categories'));
    }

    public function store(Brand $brand, ProductRequest $request)
    {
        $data = $this->gatherRequest(Product::class, $request);

        $product = new Product();
        foreach ($data as $field => $value) $product->{$field} = $value;

        $product->brand()->associate($brand);
        $product->save();
    }

    public function edit(Brand $brand, Product $product)
    {
        $categories = Category::all();
        return view('brands.products.edit', compact('brand', 'product', 'categories'));
    }

    public function update(Brand $brand, Product $product, ProductRequest $request)
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
        $q = strtolower($q);

        if ($q == '')
            $products = [];
        else {

            if ($request->has('poId')) {
                $productsId = PurchaseOrderItem::where('po_id','=', $request->get('poId'))
                    ->pluck('product_id');
                $products = Product::where("LOWER(name) like '%$q%'")
                    ->whereNotIn('id', $productsId)
                    ->limit(20)
                    ->get();
            } else {
                $products = Product::whereRaw("LOWER(name) like '%$q%'")
                    ->limit(20)
                    ->get();
            }

        }


        $resource = new Collection($products, new ProductTransformer());
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
}
