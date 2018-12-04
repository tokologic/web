<?php

namespace App\Http\Controllers;

use Api\Transformers\StallTransformer;
use App\DataTables\StallDataTable;
use App\Http\Requests\StallRequest;
use App\Model\Package;
use App\Model\Region;
use App\Model\Stall;
use App\Model\User\Midwife;
use App\Traits\Crud;
use App\Traits\Transformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use League\Fractal\Resource\Collection;

class StallController extends Controller
{
    use Crud, Transformer;

    public function index(StallDataTable $dataTable)
    {
        if (!\Sentinel::hasAnyAccess(['stall.view']))
            abort(404);

        $page = (object)['icon' => 'fa-home', 'title' => 'Kios'];
        return $dataTable->render('stalls.index', compact('page'));
    }

    public function create(Request $request)
    {

        if (!\Sentinel::hasAnyAccess(['stall.create']))
            abort(404);

        $regions = Region::all();
        $midwives = Midwife::all();
        $packages = Package::all();

        if ($request->ajax()) {
            return view('stalls.create', compact('regions', 'midwives', 'packages'));
        } else {
            return view('stalls.midwife.create', compact('regions', 'midwives', 'packages'));

        }
    }

    public function store(StallRequest $request)
    {
        if (!\Sentinel::hasAnyAccess(['stall.create']))
            abort(404);

        $stall = new Stall();
        $region = Region::find($request->get('region_id'));
        $package = Package::find($request->get('package_id'));
        $roles = \Sentinel::getUser()->roles->pluck('slug')->toArray();

        $midwife = in_array('midwife', $roles) ? Midwife::find(\Sentinel::getUser()->id) : Midwife::find($request->get('midwife_id'));

        $stall->name = $request->get('name');
        $stall->address = $request->get('address');
        $stall->acreage = $request->get('acreage');
        $stall->latitude = $request->get('latitude');
        $stall->longitude = $request->get('longitude');
        $stall->region()->associate($region);
        $stall->midwife()->associate($midwife);
        $stall->package()->associate($package);
        $stall->save();

        if (!$request->ajax())
            return redirect('/stalls');


    }

    public function show($storeId)
    {
//        if (!\Sentinel::hasAnyAccess(['stall.show']))
//            abort(404);

        $store = Stall::with(['midwife', 'region'])->find($storeId);
        return view('stalls.show', compact('store'));

    }

    public function edit($storeId)
    {
        if (!\Sentinel::hasAnyAccess(['stall.update']))
            abort(404);

        $store = Stall::find($storeId);
        $regions = Region::all();
        $midwives = Midwife::all();

        return view('stalls.edit', compact('regions', 'midwives', 'store'));
    }

    public function update($storeId, Request $request)
    {
        if (!\Sentinel::hasAnyAccess(['stall.update']))
            abort(404);

        $data = $this->gatherRequest(Stall::class, $request);
        $data = array_merge($data, [
            'deployment_date' => Carbon::parse($request->get('deployment_date'))
        ]);

        $stall = Stall::find($storeId);
//        dd($stall, $data);
        $stall->update($data);
    }

    public function destroy(Stall $stall)
    {

        if (!\Sentinel::hasAnyAccess(['stall.delete']))
            abort(404);

        try {
            $stall->delete();
        } catch (\Exception $e) {
            return [
                'error'   => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function select2(Request $request)
    {
        $q = $request->get('q');
        $q = strtolower($q);
        $user = \Sentinel::getUser();
        $roles = $user->roles->pluck('slug')->toArray();

        if ($q == '')
            $suppliers = [];
        else {
            $suppliers = Stall::whereRaw("LOWER(name) like '%$q%'");

            if(in_array('midwife', $roles))
                $suppliers = $suppliers->where('midwife_id', $user->id);
            $suppliers = $suppliers->limit(20)->get();
        }

        $resource = new Collection($suppliers, new StallTransformer());
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }

    public function approve($storeId, Request $request)
    {
        if (!\Sentinel::hasAnyAccess(['stall.approve']))
            abort(404);

        $store = Stall::find($storeId);
        $store->status = 'approved';
        $store->save();

    }

    public function pay($storeId)
    {
//        if (!\Sentinel::hasAnyAccess(['stall.pay']))
//            abort(404);

        $store = Stall::find($storeId);
        return view('stalls.pay', compact('store'));
    }
}
