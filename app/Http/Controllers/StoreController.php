<?php

namespace App\Http\Controllers;

use App\DataTables\StoreDataTable;
use App\Http\Requests\StoreRequest;
use App\Model\Midwife;
use App\Model\Region;
use App\Model\Store;
use App\Traits\Crud;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    use Crud;

    public function index(StoreDataTable $dataTable)
    {
        $page = (object)['icon' => 'fa-home', 'title' => 'Stores'];
        return $dataTable->render('stores.index', compact('page'));
    }

    public function create()
    {
        $regions = Region::all();
        $midwives = Midwife::all();
        return view('stores.create', compact('regions', 'midwives'));
    }

    public function store(StoreRequest $request)
    {
        $store = new Store();
        $store->create($request->all());
    }

    public function edit(Store $store)
    {
        $regions = Region::all();
        $midwives = Midwife::all();
        return view('stores.edit', compact('regions', 'midwives', 'store'));
    }

    public function update(Store $store, StoreRequest $request)
    {
        $data = $this->gatherRequest(Store::class, $request);
        $store->update($data);
    }

    public function destroy(Store $store)
    {
        try {
            $store ->delete();
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
