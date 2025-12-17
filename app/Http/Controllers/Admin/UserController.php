<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UpdateUserAccountRequest;
use App\Services\UserService;
use App\Traits\ControllerResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ControllerResponse;
    protected UserService $userService;
    /**
     * Display a listing of the resource.
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->all();
        return view('pages.admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistrationRequest $request)
    {
        try {
            $this->userService->create($request->validated());
            return $this->successResponse('User successfully create', null, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Creating user failed', $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $user = $this->userService->getUser($id);
            return $this->successResponse('User successfully found', $user, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('User not found', $th->getMessage(), 401);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserAccountRequest $request, string $id)
    {
        try {
            $update = $this->userService->updateUser($request->validated(), $id);
            return $this->successResponse('Successfully user is update', $update, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Updating user failed', $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->userService->deleteUser($id);
            return $this->successResponse('User successfully deleted', null, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Failed to delete user', $th->getMessage(), 500);
        }
    }

    public function enableDisable(int $id, int $status)
    {
        try {
            $this->userService->enableDisable($id, $status);
            return $this->successResponse('Account status is successfully updated', null, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Failed to update status', $th->getMessage(), 500);
        }
    }
}
