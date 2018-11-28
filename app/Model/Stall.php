<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Stall extends Model
{
    protected $table = 'stores';
    protected $fillable = [
        'midwife_id',
        'region_id',
        'name',
        'address',
        'acreage'
    ];

    public function midwife()
    {
        return $this->belongsTo(Midwife::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
