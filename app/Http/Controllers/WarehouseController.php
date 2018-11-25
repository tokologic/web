<?php


namespace App\Http\Controllers;


use Api\Transformers\WarehouseTransformer;
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
}
