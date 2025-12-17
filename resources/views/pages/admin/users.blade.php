@extends('layouts.admin')

@section('mainContent')

<!-- Permission Table -->
<div class="modal fade" id="userModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="userModelLabel">New User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id='storeUserForm'>
                    @csrf
                    <div class="mb-3">
                        <label class="col-form-label">Full name:</label>
                        <label for="" class="validationError" id='responseName'></label>
                        <input type="text" class="form-control" name="name" placeholder="John Doe">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Email address:</label>
                        <label for="" class="validationError" id='responseEmail'></label>
                        <input type="text" class="form-control" name="email" placeholder="you@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Role:</label>
                        <label for="" class="validationError" id='responseRole'></label>
                        <select name="role" class="form-control">
                            <option value="" disabled selected>Select Role</option>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Password:</label>
                        <label for="" class="validationError" id='responsePassword'></label>
                        <input type="password" class="form-control" name="password" placeholder="********">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Confirm Password:</label>
                        <label for="" class="validationError" id='responsePassword'></label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="********">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="footerBtn">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='addUser'>Add</button>
                </div>
            </div>
            <div class="userInsertResponse text-center text-success pb-4 insertResponse"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="userEditModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="userModelLabel">Edit User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="PATCH" id='editUserForm'>
                    @csrf
                    <input type="hidden" name='id' id='userId'>
                    <div class="mb-3">
                        <label class="col-form-label">Full name:</label>
                        <label for="" class="validationError" id='responseUpdateName'></label>
                        <input type="text" class="form-control" name="name" placeholder="John Doe">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Email address:</label>
                        <label for="" class="validationError" id='responseUpdateEmail'></label>
                        <input type="text" class="form-control" name="email" placeholder="you@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Role:</label>
                        <label for="" class="validationError" id='responseUpdateRole'></label>
                        <select name="role" class="form-control">
                            <option value="" disabled selected>Select Role</option>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                            <option value="Visitor">Visitor</option>
                            <option value="Author">Author</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Password:</label>
                        <label for="" class="validationError" id='responseUpdatePassword'></label>
                        <input type="password" class="form-control" name="password" placeholder="********">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Confirm Password:</label>
                        <label for="" class="validationError"></label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="********">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="footerBtn">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='updateUser'>Update</button>
                </div>
            </div>
            <div class="userUpdateResponse text-center text-success pb-4 updateResponse"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="userActionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="">Enable / Disable</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure want to perform this action?</p>
            </div>
            <form action="" id='userActionForm'>
                @csrf
                <input type="hidden" id='userActionId' name="id">
                <input type="hidden" id='userActionStatus' name="status">
            </form>
            <div class="modal-footer">
                <div class="footerBtn">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='actionOnAccount'></button>
                </div>
            </div>
            <div class="text-center text-primary pb-4 actionAccountResponse"></div>
        </div>
    </div>
</div>
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h6 class="fw-bold mb-0">Users</h6>
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#userModel">Create</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0 w-100">
            <thead class="table-light">
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Verified</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><span class="badge {{$user->status->color()}}">{{$user->status->label()}}</span></td>
                    <td>
                        <small class="bg-secondary p-1 rounded text-white">{{$user->getRoleNames()->implode(', ')}}</small>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-secondary editUserAccount" userId='{{$user->id}}'><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-outline-danger actionUserAccount" userId="{{$user->id}}" userStatus="{{$user->status}}"><i class="bi bi-arrow-left-right"></i></button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan='6'>
                        <p class="text-center">There is no user account register yet..</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endSection