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
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $data = $this->gatherRequest(User::class, $request);
        User::create($data);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
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
