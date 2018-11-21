<?php


namespace App\Http\Controllers\Warehouse;

use App\DataTables\Warehouse\PODataTables;
use App\Http\Controllers\Controller;

class PurchaseOrdersController extends Controller
{
    public function index(PODataTables $dataTables)
    {
        return $dataTables->render('warehouse.po.index');
    }

    public function create()
    {
        return view('warehouse.po.create');
    }
}
