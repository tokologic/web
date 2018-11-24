<?php

namespace App\Observers;

use App\Model\Role;

class RoleObserver
{
    public function creating(Role $role)
    {
        $role->slug = increment_slug($role->name, Role::class);
    }
}
