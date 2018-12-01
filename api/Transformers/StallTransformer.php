<?php


namespace Api\Transformers;

use App\Model\Stall;
use League\Fractal\TransformerAbstract;

class StallTransformer extends TransformerAbstract
{
    public function transform(Stall $stall)
    {
        return [
            'id'    => $stall->id,
            'name'  => $stall->name,
            'address' => $stall->address
        ];
    }
}