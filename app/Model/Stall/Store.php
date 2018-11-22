<?php

namespace App\Model\Stall;

use App\Model\Region;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Stall\Store
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Store newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Store query()
 * @mixin \Eloquent
 */
class Store extends Model
{
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
