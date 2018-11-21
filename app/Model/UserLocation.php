<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\UserLocation
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $actions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\UserLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\UserLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\UserLocation query()
 * @mixin \Eloquent
 * @property int $id
 * @property integer $user_id
 * @property integer $location_id
 * @property integer $location_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\UserLocation whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\UserLocation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\UserLocation whereLocationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\UserLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\UserLocation whereUpdatedAt($value)
 */
class UserLocation extends Model
{
    //
}
