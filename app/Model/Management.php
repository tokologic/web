<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Builder;

class Management extends User
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('management', function (Builder $builder) {
            $builder->where('role','=','midwife');
        });
    }
}
