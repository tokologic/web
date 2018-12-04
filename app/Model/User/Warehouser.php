<?php


namespace App\Model\User;


use App\Model\User;
use App\Model\Warehouse;
use Illuminate\Database\Eloquent\Builder;

class Warehouser extends User
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('warehouse-keeper', function (Builder $builder) {
            $builder->select(['users.*'])
                ->leftJoin('role_users', 'role_users.user_id', '=', 'users.id')
                ->leftJoin('roles', 'roles.id', '=', 'role_users.role_id')
                ->where('roles.slug', '=', 'warehouse-keeper');
        });
    }

    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'users_locations','user_id','location_id')
            ->withTimestamps();
    }
}
