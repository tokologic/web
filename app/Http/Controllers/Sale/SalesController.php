<?php

namespace App\Http\Controllers\Sale;

use App\DataTables\SaleDataTable;
use App\DataTables\SaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Model\Sale;
use App\Traits\Crud;

class SalesController extends Controller
{
    use Crud;

    public function index(SaleDataTable $dataTable)
    {
        $page = (object)['icon' => 'fa-bold', 'title' => 'Sales'];
        return $dataTable->render('sale.index', compact('page'));
    }

    public function create()
    {
        return view('sale.create');
    }

    public function show($id, SaleItemDataTable $dataTable)
    {
        $sale = Sale::find($id);

        return $dataTable->with('sale', $sale)
            ->render('sale.show', compact('sale'));
    }

    public function store(SaleRequest $request)
    {
        $data = $this->gatherRequest(Sale::class, $request);

        $brand = new Sale();
        $brand->create($data);
    }

    public function updateQuantity()
    {
        return view('sale.edit');
    }

    public function checkout()
    {
        return view('sale.checkout');
    }

    public function previous()
    {
        return view('sale.previous');
    }

    public function download($id)
    {
        return response()->download(public_path('files/struk.JPG'), 'Transaksi #' . $id);
    }
}
