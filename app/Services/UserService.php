<?php

namespace App\Services;

use App\Events\AccountStatusEvent;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

use function Symfony\Component\Clock\now;

class UserService
{
    protected UserRepositoryInterface $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function all(): LengthAwarePaginator
    {
        return $this->userRepositoryInterface->all();
    }

    public function create(array $attributes): User
    {
        $userData = [
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'email_verified_at' => now(),
            'password' => $attributes['password'],
        ];
        $newUser = $this->userRepositoryInterface->create($userData);
        $newUser->assignRole($attributes['role']);
        return $newUser;
    }

    public function getUser(string $id)
    {
        $user = $this->userRepositoryInterface->findOrFail($id);

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->roles[0]->name,
        ];
    }

    public function updateUser(array $attributes, string|int $id)
    {
        $updateData = [
            'name' => $attributes['name'],
            'email' => $attributes['email'],
        ];

        if (isset($attributes['password'])) {
            $updateData['password'] = $attributes['password'];
        }

        $updateUser = $this->userRepositoryInterface->update($updateData, $id);
        $updateUser->syncRoles($attributes['role']);

        return $updateData;
    }

    public function deleteUser(string|int $id): bool
    {
        return $this->userRepositoryInterface->delete($id);
    }

    public function enableDisable(int $id, int $status): User
    {
        $user = $this->userRepositoryInterface->enableOrDisable($status, $id);
        event(new AccountStatusEvent($user));
        return $user;
    }
}
