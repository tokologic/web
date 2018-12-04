<?php


namespace App\Observers\Stall;


use App\Model\Stall;
use Illuminate\Http\Request;

class StallObserver
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function saving(Stall $stall)
    {

        if ($this->request->has('payment')) {
            $stall->status = 'paid';
        }

    }
}
