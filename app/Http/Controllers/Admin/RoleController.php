<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Services\RoleService;
use App\Traits\ControllerResponse;

class RoleController extends Controller
{
    use ControllerResponse;
    protected RoleService $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    /**
     * Display a listing of the resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        try {
            $this->roleService->create($request->validated());
            return $this->successResponse('Role successfully created', null, 201);
        } catch (\Throwable $th) {
            return $this->errorResponse('Role creating failed', $th->getMessage(), 200);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id)
    {
        try {
            $role = $this->roleService->getRole($id);
            return $this->successResponse('Role successfully retrieved', $role, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Retrieving role failed', $th->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, string $id)
    {
        try {
            $this->roleService->update($request->validated(), $id);
            return $this->successResponse('Role successfully updated', null, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Role updating failed', $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->roleService->delete($id);
            return $this->successResponse('Role successfully deleted', null, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Role deleting failed', null, 500);
        }
    }
}
