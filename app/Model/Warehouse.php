<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Warehouse
 *
 * @property int $id
 * @property int $region_id
 * @property string $name
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Warehouse whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Warehouse extends Model
{

}
