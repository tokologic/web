<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ProductImage
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $actions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductImage query()
 * @mixin \Eloquent
 * @property int $product_id
 * @property int $asset_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductImage whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductImage whereAssetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProductImage whereUpdatedAt($value)
 */
class ProductImage extends Model
{
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
