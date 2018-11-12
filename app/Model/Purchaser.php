<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Builder;

/**
 * App\Model\Purchaser
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $actions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchaser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchaser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchaser query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string|null $permissions
 * @property string|null $last_login
 * @property string|null $first_name
 * @property string|null $last_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchaser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchaser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchaser whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchaser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchaser whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchaser whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchaser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchaser wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchaser whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Purchaser whereUpdatedAt($value)
 */
class Purchaser extends User
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('purchaser', function (Builder $builder) {
            $builder->where('role','=','purchaser');
        });
    }
}
