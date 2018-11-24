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
 * @property int $id
 * @property int $midwife_id
 * @property int|null $region_id
 * @property string $name
 * @property string|null $address
 * @property int|null $acreage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Region|null $region
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Store whereAcreage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Store whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Store whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Store whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Store whereMidwifeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Store whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Store whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall\Store whereUpdatedAt($value)
 */
class Store extends Model
{
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
