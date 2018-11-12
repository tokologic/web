<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Model\Product
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $actions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereUpdatedAt($value)
 */
class Product extends Model
{
    protected $fillable = ['name','description','barcode'];


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


}
