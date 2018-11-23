<?php


namespace Api\Transformers;


use App\Model\Supplier;
use League\Fractal\TransformerAbstract;

class SupplierTransformer extends TransformerAbstract
{
    public function transform(Supplier $supplier)
    {
        return [
            'id'    => $supplier->id,
            'name'  => $supplier->name,
            'address' => $supplier->address
        ];
    }
}
