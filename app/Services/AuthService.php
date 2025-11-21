<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use Illuminate\Auth\Events\Registered;

class AuthService
{
    protected AuthRepositoryInterface $authRepositoryInterface;
    protected RoleRepositoryInterface $roleRepositoryInterface;
    /**
     * Create a new class instance.
     */
    public function __construct(AuthRepositoryInterface $authRepositoryInterface, RoleRepositoryInterface $roleRepositoryInterface)
    {
        $this->authRepositoryInterface = $authRepositoryInterface;
        $this->roleRepositoryInterface = $roleRepositoryInterface;
    }

    public function getRoles()
    {
        return $this->roleRepositoryInterface->all();
    }

    public function create(array $attributes): User
    {
        $user = $this->authRepositoryInterface->create($attributes);
        $user->assignRole($attributes['role']);
        event(new Registered($user));
        return $user;
    }
}
