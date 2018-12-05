<?php


namespace App\Http\Controllers\Warehouse;


use App\DataTables\StockDataTable;
use App\Http\Controllers\Controller;
use App\Model\User\Warehouser;
use App\Model\Warehouse;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    public function index(StockDataTable $dataTable)
    {
//        $user = \Sentinel::getUser();
//        $user = Warehouser::find($user->id);
//        $wh = $user->warehouses()->first();
//        $page = (object)['icon' => 'fa-user-o', 'title' => 'Stock Item'];
//        return $dataTable->with(['warehouse' => $wh])
//            ->render('stocks.index', compact('page'));
        return view('warehouse.stock.index');
    }

    public function send()
    {
//        $user = \Sentinel::getUser();
//        $user = Warehouser::find($user->id);
//        $wh = $user->warehouses()->first();
//        $page = (object)['icon' => 'fa-user-o', 'title' => 'Stock Item'];
//        return $dataTable->with(['warehouse' => $wh])
//            ->render('stocks.index', compact('page'));
        return view('warehouse.stock.send');
    }



}
