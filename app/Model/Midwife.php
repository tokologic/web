<?php


namespace App\Model;


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
 */
class Midwife extends User
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('midwife', function (Builder $builder) {
            $builder->where('role','=','midwife');
        });
    }
}
