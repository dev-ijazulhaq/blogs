<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Services\PermissionService;
use App\Traits\ControllerResponse;

class PermissionController extends Controller
{
    use ControllerResponse;

    protected PermissionService $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        try {
            $this->permissionService->create($request->validated());
            return $this->successResponse('Permission successfully created', null, 201);
        } catch (\Throwable $th) {
            return $this->errorResponse('Permission creating failed', null, 501);
        }
    }

    /**
     * Show the form for show the specified resource.
     */
    public function show(string|int $id)
    {
        try {
            $permission = $this->permissionService->getPermission($id);
            return $this->successResponse('Permission retrieved successfully', $permission, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Permission retrieving failed', $th->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, string|int $id)
    {
        try {
            $permission = $this->permissionService->update($request->validated(), $id);
            return $this->successResponse('Permission successfully updated', $permission, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Permission updating failed', $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id)
    {
        try {
            $permission = $this->permissionService->delete($id);
            return $this->successResponse('Permission successfully deleted', null, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Permission deleting failed', $th->getMessage(), 500);
        }
    }
}
