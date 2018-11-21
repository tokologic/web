<?php


namespace App\Http\Controllers;


use App\DataTables\UsersDataTable;
use App\Http\Requests\UserRequest;
use App\Model\Midwife;
use App\Model\User;
use App\Traits\Crud;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    use Crud;

    public function index(UsersDataTable $dataTable)
    {
        $page = (object)['icon' => 'fa-user-o', 'title' => 'Users'];
        return $dataTable->render('users.index', compact('page'));
    }

    public function create()
    {
        $roles = \Sentinel::getRoleRepository()->createModel()->all();
        return view('users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
//        $data = $this->gatherRequest(User::class, $request);
        $user = \Sentinel::registerAndActivate([
            'email'    => $request->get('email'),
            'password' => $request->get('password')
        ]);

        $role = \Sentinel::findRoleBySlug($request->get('role'));
        $role->users()->attach($user);

        # Update rest of fields
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->save();
    }

    public function edit(User $user)
    {
        $userSentinel = \Sentinel::findById($user->id);
        $roles = \Sentinel::getRoleRepository()->createModel()->all();

        return view('users.edit', compact('roles'))->with(['user' => $userSentinel]);
    }

    public function update(User $user, Request $request)
    {
        $data = $this->gatherRequest(User::class, $request);
        $user->update($data);
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $e) {
        }
    }
}
