<?php


namespace Api\Transformers;


use App\Model\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    public function transform(Product $product)
    {
        return [
            'id'       => $product->id,
            'name'     => $product->name,
            'bar_code' => $product->bar_code,
        ];
    }
}
