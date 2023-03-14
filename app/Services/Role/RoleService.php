<?php

namespace App\Services\Role;

use App\Helpers\Helpers;
use App\Repositories\role\RoleInterface;
use Spatie\Permission\Models\Role;

class RoleService
{
    private $roleInterface;

    public function __construct(RoleInterface $roleInterface)
    {
        $this->roleInterface = $roleInterface;
    }

    public function createRole(array $data)
    {
        try {
            $result = $this->roleInterface->create([
                'name' => $data['name'],
                'guard_name' => 'web'
            ]);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Hak Akses berhasil ditambahkan.');
    }

    public function sync(Role $role, array $permissions)
    {
        try {
            $role->syncPermissions($permissions);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Hak Akses berhasil diubah.');
    }

    public function deleteRole(Role $role)
    {
        try {
            $this->roleInterface->delete($role);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Hak Akses berhasil dihapus.');
    }
}
