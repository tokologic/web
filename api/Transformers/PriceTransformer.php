<?php

namespace Api\Transformers;


use App\Model\Price;
use League\Fractal\TransformerAbstract;

class PriceTransformer extends TransformerAbstract
{
    public function transform(Price $price)
    {
        return [
            'id'            => $price->product_id,
            'unit_price_rupiah' => rupiah($price->unit_price),
            'unit_price'    => $price->unit_price,
            'tax'           => $price->tax,
            'location_type' => $price->location_type,
            'average_price' => rupiah($price->average_price),
            'product_name'  => $price->product->name
        ];
    }
}