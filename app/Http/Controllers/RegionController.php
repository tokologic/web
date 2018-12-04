<?php

namespace App\Http\Controllers;

use App\DataTables\RegionsDataTable;
use App\Http\Requests\RegionRequest;
use App\Model\Region;
use App\Traits\Crud;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    use Crud;

    public function index(RegionsDataTable $dataTable)
    {
        $page = (object)['icon' => 'fa-globe', 'title' => 'Wilayah'];
        return $dataTable->render('regions.index', compact('page'));
    }

    public function create()
    {
        $parents = Region::all();
        return view('regions.create', compact('parents'));
    }

    public function store(RegionRequest $request)
    {
        $region = new Region;
        $region->parent_id = ($request->parent != '-')?$request->parent:null;
        $region->name = $request->name;
        $region->postal_code = $request->postal_code;
        $region->save();
    }

    public function edit(Region $region)
    {
        $parents = Region::all();
        return view('regions.edit', compact('parents', 'region'));
    }

    public function update(Region $region, RegionRequest $request)
    {
        $data = $this->gatherRequest(Region::class, $request);
        $region->update($data);
    }

    public function destroy(Region $region)
    {
        try {
            $region ->delete();
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
