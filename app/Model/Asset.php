<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Asset
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $actions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asset query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $path
 * @property string $mime
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asset whereUpdatedAt($value)
 * @property-read \App\Model\ProductImage $productimage
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asset whereMime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Asset wherePath($value)
 */
class Asset extends Model
{
    public function productimage()
    {
        return $this->hasOne(ProductImage::class);
    }
}
