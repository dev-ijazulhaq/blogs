<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Services\Permission\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permission_service)
    {
        $this->permissionService = $permission_service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permissionService->getAll();
        return view('pages.admin.settings', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $formData = $request->validated();
        try {
            $service = $this->permissionService->storePermission($formData);
            return response()->json([
                'success' => true,
                'message' => 'Permission successfully created',
                'status' => 200
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permissionService = $this->permissionService->getPermission($id);
        return response()->json([
            'success' => true,
            'message' => 'Get permission',
            'data' => $permissionService
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $permissionService = $this->permissionService->updatePermission($validatedData, $id);
        try {
            return response()->json([
                'success' => true,
                'message' => 'Permission successfully updated',
                'data' => $permissionService
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Somethings went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permissionService = $this->permissionService->destroyPermission($id);
    }
}
