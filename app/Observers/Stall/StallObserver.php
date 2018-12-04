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
        if ($stall->payment != (int)$this->request->get('payment') and (int)$this->request->get('payment') != 0) {
            $stall->status = 'paid';
        }

    }
}
