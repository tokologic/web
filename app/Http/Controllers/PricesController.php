<?php


namespace App\Http\Controllers;


use App\DataTables\PricesDataTable;
use App\Model\Price;
use App\Traits\Crud;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    use Crud;

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
}
