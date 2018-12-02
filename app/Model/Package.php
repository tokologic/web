<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name', 'price'];

    public function stalls()
    {
        return $this->hasMany(Stall::class);
    }
}
