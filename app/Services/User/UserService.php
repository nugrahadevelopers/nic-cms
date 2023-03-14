<?php

namespace App\Services\User;

use App\Helpers\Helpers;
use App\Models\User;
use App\Repositories\User\UserInterface;

class UserService
{
    private $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function createUser(array $data)
    {
        try {
            $user = $this->userInterface->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            $user->assignRole($data['roles']);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Pengguna berhasil ditambahkan.');
    }

    public function updateUser(User $user, array $data)
    {
        try {
            if ($data['password'] ?? false) {
                $this->userInterface->update($user, [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                ]);
            } else {
                $this->userInterface->update($user, [
                    'name' => $data['name'],
                    'email' => $data['email'],
                ]);
            }

            $user->syncRoles($data['roles']);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Pengguna berhasil diubah.');
    }

    public function deleteUser(User $user)
    {
        try {
            $this->userInterface->delete($user);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Pengguna berhasil dihapus.');
    }
}
