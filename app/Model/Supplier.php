<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Supplier
 *
 * @property int $id
 * @property int $region_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Supplier whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Supplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Supplier whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Supplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Supplier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Supplier wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Supplier whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Supplier whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Supplier extends Model
{
    protected $table = 'suppliers';
}
