<?php


namespace Api\Transformers;


use App\Model\Warehouse;
use League\Fractal\TransformerAbstract;

class WarehouseTransformer extends TransformerAbstract
{
    public function transform(Warehouse $supplier)
    {
        return [
            'id'    => $supplier->id,
            'name'  => $supplier->name,
            'address' => $supplier->address
        ];
    }
}
