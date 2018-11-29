<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Stall
 *
 * @property int $id
 * @property int $midwife_id
 * @property int|null $region_id
 * @property string $name
 * @property string|null $address
 * @property int|null $acreage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Midwife $midwife
 * @property-read \App\Model\Region|null $region
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall whereAcreage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall whereMidwifeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Stall whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Stall extends Model
{
    protected $table = 'stores';
    protected $fillable = [
        'midwife_id',
        'region_id',
        'name',
        'address',
        'acreage'
    ];

    public function midwife()
    {
        return $this->belongsTo(Midwife::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
