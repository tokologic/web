<?php


namespace App\Http\Controllers;


use App\Model\Midwife;

class DashboardController extends Controller
{
    public function index()
    {
        $user = \Sentinel::getUser();
        $page = (object)['title' => 'Dashboard'];

        if (in_array('midwife', $user->roles->pluck('slug')->toArray())) {

            $midwife = Midwife::find($user->id);

            if (is_null($midwife->stall)) {
                return view('dashboard.empty', compact('page'));
            }
        }

        return view('dashboard.index', compact('page'));
    }
}
