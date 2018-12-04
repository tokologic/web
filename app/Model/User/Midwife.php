<?php


namespace App\Model\User;


use App\Model\Stall;
use App\Model\User;
use Illuminate\Database\Eloquent\Builder;

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
        return $this->hasMany(Stall::class, 'midwife_id');
    }
}
