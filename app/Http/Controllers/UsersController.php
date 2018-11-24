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
        if (!\Sentinel::hasAnyAccess(['user.view']))
            abort(404);

        $page = (object)['icon' => 'fa-user-o', 'title' => 'Users'];
        return $dataTable->render('users.index', compact('page'));
    }

    public function create()
    {
        if (!\Sentinel::hasAnyAccess(['user.create']))
            abort(404);

        $roles = \Sentinel::getRoleRepository()->createModel()->all();
        return view('users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        if (!\Sentinel::hasAnyAccess(['user.create']))
            abort(404);

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
        if (!\Sentinel::hasAnyAccess(['user.update']))
            abort(404);

        $userSentinel = \Sentinel::findById($user->id);
        $roles = \Sentinel::getRoleRepository()->createModel()->all();

        return view('users.edit', compact('roles'))->with(['user' => $userSentinel]);
    }

    public function update(User $user, Request $request)
    {
        if (!\Sentinel::hasAnyAccess(['user.update']))
            abort(404);

        $data = $this->gatherRequest(User::class, $request);
        $user->update($data);

        // Remove all permissions
        $user->roles()->detach();

        // Then re-attach
        $userSentinel = \Sentinel::findById($user->id);
        $role = \Sentinel::findRoleBySlug($request->get('role'));
        $userSentinel->roles()->attach($role);
    }

    public function destroy(User $user)
    {
        if (!\Sentinel::hasAnyAccess(['user.delete']))
            abort(404);

        try {
            $user->delete();
        } catch (\Exception $e) {
        }
    }
}
