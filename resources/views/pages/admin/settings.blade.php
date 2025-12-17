@extends('layouts/admin')

@section('pageName') Blogify Settings @endSection

@section('mainContent')

<div class="mainContainer">
    <!-- Dashboard Cards -->
    <div class="modal fade" id="permissionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="permissionModalLabel">New permission</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.permissions.store')}}" method="POST" id='storePermissionForm'>
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Permission:</label>
                            <label for="" class="validationError" id='responseName'></label>
                            <input type="text" class="form-control" id="recipient-name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Guard Name:</label>
                            <label for="" class="validationError" id='responseGuard'></label>
                            <select class="form-control" name="guard_name">
                                <option value="0">Select Guard</option>
                                <option value="web">WEB</option>
                                <option value="api">API</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="footerBtn">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id='addPermission'>Add</button>
                    </div>
                </div>
                <div class="permissionInsertResponse text-center text-success pb-4 insertResponse"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="permissionUpdateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="permissionModalLabel">Update permission</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="PUT" id='updatePermissionForm'>
                        @csrf
                        <input type="hidden" class="updatePermissionId" name="id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Permission:</label>
                            <label for="" class="validationError" id='responseUpdateName'></label>
                            <input type="text" class="form-control" id="recipient-name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Guard Name:</label>
                            <label for="" class="validationError" id='responseUpdateGuard'></label>
                            <select class="form-control" name="guard_name">
                                <option value="0">Select Guard</option>
                                <option value="web">WEB</option>
                                <option value="api">API</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="footerBtn">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id='updatePermission'>Update</button>
                    </div>
                </div>
                <div class="text-center text-primary pb-4 updateResponse"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="permissionDeleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Delete permission</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="PUT" id='deletePermissionForm'>
                        @csrf
                        <input type="hidden" class="deletePermissionId" name="id">
                    </form>
                    <p class="text-center">Are you sure want to delete this permission?</p>
                </div>
                <div class="modal-footer">
                    <div class="footerBtn">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id='deletePermission'>Delete</button>
                    </div>
                </div>
                <div class="text-center text-primary pb-4 deleteResponse"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="roleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="roleModalLabel">New role</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id='createRoleForm'>
                        @csrf
                        <div class="mb-3">
                            <label for="role-name" class="col-form-label">Role:</label>
                            <label for="" class="validationError" id='roleNameResponse'></label>
                            <input type="text" class="form-control" id="role-name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="guard-name" class="col-form-label">Guard name</label>
                            <label for="" class="validationError" id='roleGuardResponse'></label>
                            <select class="form-control" name="guard_name" id="">
                                <option value="0">Select Guard</option>
                                <option value="web">WEB</option>
                                <option value="api">API</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Assign Permissions:</label>
                            <label for="" class="validationError" id='assignPermissionResponse'></label>
                            <div class="row">
                                @forelse($formPermissions as $index => $permission)
                                <div class="col-6">
                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$permission->name}}">
                                    <label>{{$permission->name}}</label>
                                </div>
                                @empty
                                <div class="col-12">
                                    <p>Add the permission first</p>
                                </div>
                                @endForElse
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="footerBtn">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id='addNewRole'>Add Role</button>
                    </div>
                </div>
                <div class="roleInsertResponse text-center text-success pb-4 insertResponse"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateRoleModalLabel">Edit role</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id='updateRoleForm'>
                        @csrf
                        <input type="hidden" class="updateRoleId" name="id" value="">
                        <div class="mb-3">
                            <label for="role-name" class="col-form-label">Role:</label>
                            <label for="" class="validationError" id='updateRoleNameResponse'></label>
                            <input type="text" class="form-control" id="role-name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="guard-name" class="col-form-label">Guard name</label>
                            <label for="" class="validationError" id='updateRoleGuardResponse'></label>
                            <select class="form-control" name="guard_name" id="">
                                <option value="0">Select Guard</option>
                                <option value="web">WEB</option>
                                <option value="api">API</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Assign Permissions:</label>
                            <label for="" class="validationError" id='updateAssignPermissionResponse'></label>
                            <div class="row">
                                @forelse($formPermissions as $index => $permission)
                                <div class="col-6">
                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$permission->name}}">
                                    <label>{{$permission->name}}</label>
                                </div>
                                @empty
                                <div class="col-12">
                                    <p>Add the permission first</p>
                                </div>
                                @endForElse
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="footerBtn">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id='updateRole'>Add Role</button>
                    </div>
                </div>
                <div class="roleUpdateResponse text-center text-success pb-4 insertResponse"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="roleDeleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Delete role</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id='deleteRoleForm'>
                        @csrf
                        <input type="hidden" class="deleteRoleId" name="id">
                    </form>
                    <p class="text-center">Are you sure want to delete this role?</p>
                </div>
                <div class="modal-footer">
                    <div class="footerBtn">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id='deleteRole'>Delete</button>
                    </div>
                </div>
                <div class="text-center text-primary pb-4 deleteRoleResponse"></div>
            </div>
        </div>
    </div>
    <!-- Permission Table -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h6 class="fw-bold mb-0">Permissions</h6>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#permissionModal">Create</button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0 w-100">
                <thead class="table-light">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Guard name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $index => $permission)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->guard_name}}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary getPermission" permissionId='{{$permission->id}}'><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger showDeletePermission" permissionId='{{$permission->id}}'><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <p class="text-center">No permission exists</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="pt-3 px-3">
                {{$permissions->links()}}
            </div>
        </div>
    </div>

    <!-- Role Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h6 class="fw-bold mb-0">Roles</h6>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#roleModal">Create</button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Guard name</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $index => $role)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->guard_name}}</td>
                        <td>
                            <ul>
                                @foreach($role->permissions as $permission)
                                <li>{{$permission->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary showUpdateRoleForm" roleId='{{$role->id}}'><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger showDeleteRoleForm" roleId='{{$role->id}}'><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            <p> Roles is not added yet..</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{$roles->links()}}
            </div>
        </div>
    </div>
</div>
@endSection