<?php


namespace App\Model;


use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Model\Midwife
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $actions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Midwife newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Midwife newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Midwife query()
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Midwife whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Midwife whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Midwife whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Midwife whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Midwife whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Midwife whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Midwife wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Midwife wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Midwife whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Midwife whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Activations\EloquentActivation[] $activations
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Persistences\EloquentPersistence[] $persistences
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Reminders\EloquentReminder[] $reminders
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Roles\EloquentRole[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Throttling\EloquentThrottle[] $throttle
 */
class Midwife extends User
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('midwife', function (Builder $builder) {
            $builder->select(['users.*'])
                ->leftJoin('role_users', 'role_users.user_id', '=', 'users.id')
                ->leftJoin('roles', 'roles.id', '=', 'role_users.role_id')
                ->where('roles.slug', '=', 'midwife');
        });
    }

    public function stall()
    {
        return $this->hasOne(Stall::class, 'midwife_id');
    }
}
