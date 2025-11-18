@extends('layouts.admin')

@section('mainContent')

<!-- Permission Table -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h6 class="fw-bold mb-0">Users</h6>
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
                <tr>
                    <td>1</td>
                    <td>ijaz</td>
                    <td>dev.ijaz@gmail.com</td>
                    <td><span class="badge bg-success">Verified</span></td>
                    <td>
                        <small class="bg-secondary p-1 rounded text-white">Super admin</small>
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
@endSection