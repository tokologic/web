<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class Company extends Model
{
    use LogsActivity, CausesActivity;
    protected $fillable = ['name'];
}
