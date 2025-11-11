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
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Assign Permissions:</label>
                            <div class="row">
                                <div class="col-4">
                                    <input type="checkbox" class="form-check-input">
                                    <label>Manage Setting</label>
                                </div>
                                <div class="col-4">
                                    <input type="checkbox" class="form-check-input">
                                    <label>Manage Setting</label>
                                </div>
                                <div class="col-4">
                                    <input type="checkbox" class="form-check-input">
                                    <label>Manage Setting</label>
                                </div>
                                <div class="col-4">
                                    <input type="checkbox" class="form-check-input">
                                    <label>Manage Setting</label>
                                </div>
                                <div class="col-4">
                                    <input type="checkbox" class="form-check-input">
                                    <label>Manage Setting</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Posts Table -->
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $index => $permission)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$permission->name}}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary getPermission" permissionId='{{$permission->id}}'><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger showDeletePermission" permissionId='{{$permission->id}}'><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">
                            <p class="text-center">No permission exists</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Posts Table -->
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
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Admin</td>
                        <td>
                            <ul>
                                <li>Manage.Setting</li>
                                <li>Manage.Users</li>
                            </ul>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endSection