<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $table = 'product_prices';

    protected $fillable = ['product_id', 'average_price', 'unit_price'];

    public function location()
    {
        return $this->morphTo();
    }
}
