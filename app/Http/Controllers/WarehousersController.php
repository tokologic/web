<?php


namespace App\Http\Controllers;


use App\DataTables\WarehousersDataTable;
use App\Model\User\Warehouser;
use App\Model\Warehouse;
use App\Traits\Crud;
use Illuminate\Http\Request;

class WarehousersController extends Controller
{
    use Crud;

    public function index(WarehousersDataTable $dataTable)
    {
        $page = (object)['icon' => 'fa-user-o', 'title' => 'Penjaga Gudang'];
        return $dataTable->render('warehousers.index', compact('page'));
    }

    public function create()
    {
        $warehouses = Warehouse::all();
        return view('warehousers.create', compact('warehouses'));

    }

    public function store(Request $request)
    {
        $user = \Sentinel::registerAndActivate([
            'email'    => $request->get('email'),
            'password' => $request->get('password')
        ]);

        $role = \Sentinel::findRoleBySlug('warehouse-keeper');
        $role->users()->attach($user);

        $user = Warehouser::find($user->id);
        $wh = Warehouse::find($request->get('warehouse_id'));

        # Update rest of fields
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->warehouses()->detach();
        $user->warehouses()->attach($wh);
        $user->save();
    }

    public function edit($id)
    {
        $user = Warehouser::find($id);
        $warehouses = Warehouse::all();

        return view('warehousers.edit', compact('warehouses'))->with(['warehouser' => $user]);

    }

    public function update($id, Request $request)
    {
        $data = $this->gatherRequest(Warehouser::class, $request);
        $user = Warehouser::find($id);

        $user->warehouses()->detach();
        $user->update($data);

        $wh = Warehouse::find($request->get('warehouse_id'));
        $user->warehouses()->attach($wh);
    }

    public function destroy($id)
    {
        try {
            $user = Warehouser::find($id);
            $user->delete();
        } catch (\Exception $e) {
        }
    }
}
