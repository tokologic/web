<?php


namespace App\Http\Controllers;


use App\Model\User\Midwife;

class DashboardController extends Controller
{
    public function index()
    {
        $user = \Sentinel::getUser();
        $page = (object)['title' => 'Dashboard'];

        if (in_array('midwife', $user->roles->pluck('slug')->toArray())) {

            $midwife = Midwife::find($user->id);

            if (is_null($midwife->stall) || count($midwife->stall) == 0) {
                return view('dashboard.empty', compact('page'));
            }
        }

        return view('dashboard.index', compact('page'));
    }
}
