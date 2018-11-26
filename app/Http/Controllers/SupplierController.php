<?php


namespace App\Http\Controllers;


use Api\Transformers\SupplierTransformer;
use App\DataTables\SupplierDataTable;
use App\Http\Requests\SupplierRequest;
use App\Model\Product;
use App\Model\Region;
use App\Model\Supplier;
use App\Traits\Crud;
use App\Traits\Transformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class SupplierController extends Controller
{
    use Crud, Transformer;

    public function select2(Request $request)
    {
        $q = $request->get('q');
        $q = strtolower($q);

        if ($q == '')
            $suppliers = [];
        else {
            $suppliers = Supplier::whereRaw("LOWER(name) like '%$q%'")->limit(20)->get();
        }

        $resource = new Collection($suppliers, new SupplierTransformer());
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }

    public function index(SupplierDataTable $dataTable)
    {
        $page = (object)['icon' => 'fa-user', 'title' => 'Suppliers'];
        return $dataTable->render('suppliers.index', compact('page'));
    }

    public function create()
    {
        $regions = Region::all();
        $products = Product::all();
        return view('suppliers.create', compact('regions', 'products'));
    }

    public function store(SupplierRequest $request)
    {
        $product_ids = request()->get('product_ids');
        $supplier = Supplier::create($request->all());

        $supplier->products()->attach($product_ids);
    }

    public function edit(Supplier $supplier)
    {
        $regions = Region::all();
        $products = Product::all();
        $product_ids = collect($supplier->products()->get())->pluck('id')->toArray();
        return view('suppliers.edit', compact('regions', 'supplier', 'products', 'product_ids'));
    }

    public function update(Supplier $supplier, SupplierRequest $request)
    {
        $data = $this->gatherRequest(Supplier::class, $request);
        $supplier->update($data);

        $supplier->products()->sync($request->get('product_ids'));
    }

    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->products()->detach();
            $supplier->delete();
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
