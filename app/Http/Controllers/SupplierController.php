<?php


namespace App\Http\Controllers;


use Api\Transformers\SupplierTransformer;
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
            $suppliers = Supplier::where("name", "like", "%$q%")->get();


        $resource = new Collection($suppliers, new SupplierTransformer());
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
}
