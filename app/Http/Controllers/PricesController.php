<?php


namespace App\Http\Controllers;


use Api\Transformers\PriceTransformer;
use App\DataTables\PricesDataTable;
use App\Model\Price;
use App\Traits\Crud;
use App\Traits\Transformer;
use League\Fractal\Resource\Collection;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    use Crud, Transformer;

    public function index(PricesDataTable $dataTable)
    {
        return $dataTable->render('prices.index');
    }

    public function create()
    {
        return view('prices.create');
    }

    public function store(Request $request)
    {
//        $data = $this->gatherRequest(Price::class, $request);
//        $price = new Price();
//        foreach ($data as $field => $value) $price->{$field} = $value;

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

    public function select2(Request $request)
    {
        $q = $request->get('q');
        $q = strtolower($q);

        if ($q == '')
            $prices = [];
        else {
            $prices = Price::with('product')->whereHas('product', function($query) use($q){
                return $query->whereRaw("LOWER(name) like '%$q%'");
            })->limit(20)->get();
        }

        $resource = new Collection($prices, new PriceTransformer());
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
}
