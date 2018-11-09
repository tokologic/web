<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Builder;

class Admin extends User
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('purchaser', function (Builder $builder) {
            $builder->where('role','=','admin');
        });
    }
}
