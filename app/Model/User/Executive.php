<?php


namespace App\Model\User;


use App\Model\User;
use Illuminate\Database\Eloquent\Builder;

class Executive extends User
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('executive', function (Builder $builder) {
            $builder->select(['users.*'])
                ->leftJoin('role_users', 'role_users.user_id', '=', 'users.id')
                ->leftJoin('roles', 'roles.id', '=', 'role_users.role_id')
                ->where('roles.slug', '=', 'executive');
        });
    }
}
