<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PermissionService;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    protected PermissionService $permissionService;
    protected RoleService $roleService;


    public function __construct(PermissionService $permissionService, RoleService $roleService)
    {
        $this->permissionService = $permissionService;
        $this->roleService = $roleService;
    }

    public function index(): View
    {
        $permissions = $this->permissionService->all();
        $roles = $this->roleService->all();

        return View('pages.admin.settings', compact('permissions', 'roles'));
    }
}
