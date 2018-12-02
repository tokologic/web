<?php

namespace App\Console\Commands;

use App\Model\Role;
use Illuminate\Console\Command;

class DataRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init and update roles reference data';

    protected $roles = [
        'Super Administrator',
        'Administrative',
        'Finance',
        'Midwife',
        'Executive',
        'Warehouse Keeper',
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->roles as $role) {
            Role::firstOrCreate(['name' => $role]);
            $method = camel_case($role . ' Permissions');

            if (method_exists($this, $method)) {
                $this->{$method}();
            }
        }
    }

    protected function superAdministratorPermissions(): void
    {
        $role = $this->findRole(__FUNCTION__);
        $role->permissions = [
            '*' => true,
        ];
        $role->save();
    }

    protected function administrativePermissions()
    {
        $role = $this->findRole(__FUNCTION__);
        $role->permissions = [
            'warehouse.create'              => true,
            'warehouse.update'              => true,
            'warehouse.view'                => true,
            'warehouse.delete'              => true,
            'warehouse.po.create'           => true,
            'warehouse.po.update'           => true,
            'warehouse.po.view'             => true,
            //            'warehouse.po.delete'            => false,
            //            'warehouse.po.status.approve'    => false,
            //            'warehouse.po.status.correction' => false,
            //            'warehouse.po.status.revoke'     => false,
            'warehouse.po.status.attention' => true,
            'warehouse.po.status.draft'     => true,
            'warehouse.po.status.issued'    => true,
            'warehouse.po.status.new'       => true,

            'warehouse.po.item.*' => true,

            'stall.view'   => true,
            'stall.update' => true
        ];
        $role->save();
    }

    protected function financePermissions()
    {
        $role = $this->findRole(__FUNCTION__);
        $role->permissions = [
            'warehouse.po.view'              => true,
            'warehouse.po.status.approve'    => true,
            'warehouse.po.status.correction' => true,
            'warehouse.po.status.revoke'     => true,
            //            'warehouse.po.status.attention'  => false,
            //            'warehouse.po.status.draft'      => false,
            //            'warehouse.po.status.issued'     => false,
            //            'warehouse.po.status.new'        => false,
        ];
        $role->save();
    }

    protected function warehouseKeeperPermissions()
    {
        $role = $this->findRole(__FUNCTION__);
        $role->permissions = [
            'warehouse.gr.*'
        ];
        $role->save();
    }

    protected function midwifePermissions()
    {
        $role = $this->findRole(__FUNCTION__);
        $role->permissions = [
            'stall.view'   => true,
            'stall.create' => true,
            'stall.update' => true
        ];
        $role->save();
    }

    /**
     * @param $methodName
     * @return string
     */
    private function extractRoleNameFromMethod($methodName): string
    {
        $rolePermissionsString = str_replace('-', ' ', title_case(kebab_case($methodName)));
        return trim(str_replace('Permissions', '', $rolePermissionsString));
    }

    /**
     * @param $methodName
     * @return mixed
     */
    private function findRole($methodName)
    {
        $roleString = $this->extractRoleNameFromMethod($methodName);
        return \Sentinel::findRoleByName($roleString);
    }
}
