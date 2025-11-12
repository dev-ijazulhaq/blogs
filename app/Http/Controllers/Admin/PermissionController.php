<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Services\PermissionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    protected PermissionService $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $permissions = $this->permissionService->all();
        return view('pages.admin.settings', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request): JsonResponse
    {
        try {
            $this->permissionService->create($request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Permission successfully created',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Permission creating failed',
                'errors' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for show the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        try {
            $permission = $this->permissionService->getPermission($id);
            return response()->json([
                'success' => true,
                'message' => 'Permission retrieved successfully',
                'data' => $permission
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Permission retrieving failed',
                'errors' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, string|int $id): JsonResponse
    {
        try {
            $permission = $this->permissionService->update($request->validated(), $id);
            return response()->json([
                'success' => true,
                'message' => 'Permission successfully updated',
                'data' => $permission
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Permission updating failed',
                'errors' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        try {
            $permission = $this->permissionService->delete($id);
            return response()->json([
                'success' => true,
                'message' => 'Permission successfully deleted',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Permission deleting failed',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
