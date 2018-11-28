<?php

namespace App\Http\Controllers;

use Api\Transformers\StallTransformer;
use App\DataTables\StallDataTable;
use App\Http\Requests\StallRequest;
use App\Model\Midwife;
use App\Model\Region;
use App\Model\Stall;
use App\Traits\Crud;
use App\Traits\Transformer;
use Illuminate\Http\Request;
use League\Fractal\Resource\Collection;

class StallController extends Controller
{
    use Crud, Transformer;

    public function index(StallDataTable $dataTable)
    {
        $page = (object)['icon' => 'fa-home', 'title' => 'Stalls'];
        return $dataTable->render('stalls.index', compact('page'));
    }

    public function create()
    {
        $regions = Region::all();
        $midwives = Midwife::all();
        return view('stalls.create', compact('regions', 'midwives'));
    }

    public function store(StallRequest $request)
    {
        $stall = new Stall();
        $stall->create($request->all());
    }

    public function edit(Stall $store)
    {
        $regions = Region::all();
        $midwives = Midwife::all();
        return view('stalls.edit', compact('regions', 'midwives', 'store'));
    }

    public function update(Stall $stall, StallRequest $request)
    {
        $data = $this->gatherRequest(Stall::class, $request);
        $stall->update($data);
    }

    public function destroy(Stall $stall)
    {
        try {
            $stall ->delete();
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function select2(Request $request)
    {
        $q = $request->get('q');
        $q = strtolower($q);

        if ($q == '')
            $suppliers = [];
        else {
            $suppliers = Stall::whereRaw("LOWER(name) like '%$q%'")->limit(20)->get();
        }

        $resource = new Collection($suppliers, new StallTransformer());
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
}
