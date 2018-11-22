<?php

namespace App\Model\Stall;

use Illuminate\Database\Eloquent\Model;

class GoodsReceiveItem extends Model
{
    protected $table = 'store_gr_items';

    public function goodsreceive()
    {
        return $this->belongsTo(GoodsReceive::class);
    }
}
