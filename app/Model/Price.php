<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Price
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $actions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Price newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Price newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Price query()
 * @mixin \Eloquent
 * @property int $id
 * @property integer $product_id
 * @property integer $unit_price
 * @property integer $tax
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Price whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Price whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Price whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Price whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Price whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Price whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Price whereUnitPrice($value)
 * @property string $location_type
 * @property int $location_id
 * @property float $average_price
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Price whereAveragePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Price whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Price whereLocationType($value)
 */
class Price extends Model
{
    protected $table = 'product_prices';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
