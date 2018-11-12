<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
