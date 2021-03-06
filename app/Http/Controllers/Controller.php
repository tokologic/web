<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;

    public function __construct()
    {
        if (\Sentinel::check())
            $this->user = \Sentinel::getUser();
    }

    public function isMidwife()
    {
        $roles = $this->user->roles->pluck('slug')->toArray();

        if (in_array('midwife', $roles)) {
            return true;
        }

        return false;
    }

    public function isWarehouseKeeper()
    {

    }
}
