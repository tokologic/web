<?php

namespace App\Model;

use App\Model\Stall\Store;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Region
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string|null $postal_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Stall\Store[] $stores
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Supplier[] $suppliers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Warehouse[] $warehouses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Region whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Region wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Region whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Region extends Model
{
    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }
}
