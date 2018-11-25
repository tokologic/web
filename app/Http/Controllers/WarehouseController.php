<?php


namespace App\Http\Controllers;


use Api\Transformers\WarehouseTransformer;
use App\DataTables\WarehouseDataTable;
use App\Http\Requests\WarehouseRequest;
use App\Model\Region;
use App\Model\Warehouse;
use App\Traits\Crud;
use App\Traits\Transformer;
use Illuminate\Http\Request;
use League\Fractal\Resource\Collection;

class WarehouseController extends Controller
{
    use Crud, Transformer;

    public function select2(Request $request)
    {
        $q = $request->get('q');
        if ($q == '')
            $suppliers = [];
        else
            $suppliers = Warehouse::where("name", "like", "%$q%")->limit(20)->get();


        $resource = new Collection($suppliers, new WarehouseTransformer());
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }

    public function index(WarehouseDataTable $dataTable)
    {
        $page = (object)['icon' => 'fa-home', 'title' => 'Warehouses'];
        return $dataTable->render('warehouse.index', compact('page'));
    }

    public function create()
    {
        $regions = Region::all();
        return view('warehouse.create', compact('regions'));
    }

    public function store(WarehouseRequest $request)
    {
        $warehouse = new Warehouse();
        $warehouse->create($request->all());
    }

    public function edit(Warehouse $warehouse)
    {
        $regions = Region::all();
        return view('warehouse.edit', compact('regions', 'warehouse'));
    }

    public function update(Warehouse $warehouse, WarehouseRequest $request)
    {
        $data = $this->gatherRequest(Warehouse::class, $request);
        $warehouse->update($data);
    }

    public function destroy(Warehouse $warehouse)
    {
        try {
            $warehouse ->delete();
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
