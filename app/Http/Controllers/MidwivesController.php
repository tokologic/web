<?php


namespace App\Http\Controllers;


use App\DataTables\MidwivesDataTable;
use App\Model\User;
use App\Traits\Crud;
use Illuminate\Http\Request;

class MidwivesController extends Controller
{
    use Crud;

    public function index(MidwivesDataTable $dataTable)
    {
        $page = (object)['icon' => 'fa-user-o', 'title' => 'Bidan'];
        return $dataTable->render('midwives.index', compact('page'));
    }

    public function create()
    {
        return view('midwives.create');

    }

    public function store(Request $request)
    {
        $user = \Sentinel::registerAndActivate([
            'email'    => $request->get('email'),
            'password' => $request->get('password')
        ]);

        $role = \Sentinel::findRoleBySlug('midwife');
        $role->users()->attach($user);

        # Update rest of fields
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->save();
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('midwives.edit')->with(['midwife' => $user]);

    }

    public function update($id, Request $request)
    {
        $data = $this->gatherRequest(User::class, $request);
        $user = User::find($id);
        $user->update($data);
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
        } catch (\Exception $e) {
        }
    }
}
