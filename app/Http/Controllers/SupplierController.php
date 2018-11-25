<?php


namespace App\Http\Controllers;


use Api\Transformers\SupplierTransformer;
use App\DataTables\SupplierDataTable;
use App\Http\Requests\SupplierRequest;
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
        if ($q == '')
            $suppliers = [];
        else
            $suppliers = Supplier::where("name", "like", "%$q%")->limit(20)->get();


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
        return view('suppliers.create', compact('regions'));
    }

    public function store(SupplierRequest $request)
    {
        $supplier = new Supplier();
        $supplier->create($request->all());
    }

    public function edit(Supplier $supplier)
    {
        $regions = Region::all();
        return view('suppliers.edit', compact('regions', 'supplier'));
    }

    public function update(Supplier $supplier, Request $request)
    {
        $data = $this->gatherRequest(Supplier::class, $request);
        $supplier->update($data);
    }

    public function destroy(Supplier $supplier)
    {
        try {
            $supplier ->delete();
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
