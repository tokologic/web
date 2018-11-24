<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Builder;

/**
 * App\Model\Management
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $actions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Management newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Management newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Management query()
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Management whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Management whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Management whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Management whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Management whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Management whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Management wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Management wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Management whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Management whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Activations\EloquentActivation[] $activations
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Persistences\EloquentPersistence[] $persistences
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Reminders\EloquentReminder[] $reminders
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Roles\EloquentRole[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Throttling\EloquentThrottle[] $throttle
 */
class Management extends User
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('management', function (Builder $builder) {
            $builder->where('role','=','management');
        });
    }
}
