@extends('layouts.admin')


@section('mainContent')

<!-- Permission Table -->
<div class="modal fade" id="categoryModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="categoryModelLabel">New category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.categories.store')}}" method="POST" id='storeCategoryForm' enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Category:</label>
                        <label for="" class="validationError" id='responseName'></label>
                        <input type="text" class="form-control" id="recipient-name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Image:</label>
                        <label for="" class="validationError" id='responseImage'></label>
                        <input type="file" class="form-control" id="recipient-name" name="image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="footerBtn">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='addCategory'>Add</button>
                </div>
            </div>
            <div class="categoryInsertResponse text-center text-success pb-4 insertResponse"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="editCategoryModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editCategoryModelLabel">Edit category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id='editCategoryForm' enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id='editCategoryId' name="id">
                    <input type="hidden" id='editCategoryOldImage' name='oldImage'>
                    <div class="mb-3">
                        <label class="col-form-label">Category:</label>
                        <label for="" class="validationError" id='editResponseName'></label>
                        <input type="text" class="form-control" id="editCategoryname" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Image:</label>
                        <label for="" class="validationError" id='editResponseImage'></label>
                        <input type="file" class="form-control" id="recipient-name" name="image">
                    </div>
                    <div class="mb-3">
                        <img src="" alt="" id="categoryEditImagePreview" class="img-fluid w-25">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="footerBtn">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='editCategory'>Update</button>
                </div>
            </div>
            <div class="categoryEditResponse text-center text-success pb-4 editResponse"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="categoryDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="">Delete category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id='deleteCategoryForm' method="POST">
                    @csrf
                    <input type="hidden" class="deleteCategoryId" name="id">
                </form>
                <p class="text-center">Are you sure want to delete this category?</p>
            </div>
            <div class="modal-footer">
                <div class="footerBtn">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='deleteCategory'>Delete</button>
                </div>
            </div>
            <div class="text-center text-primary pb-4 deleteCategoryResponse"></div>
        </div>
    </div>
</div>
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h6 class="fw-bold mb-0">Blog Categories</h6>
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModel">Create</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0 w-100">
            <thead class="table-light">
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $index => $category)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$category->name}}</td>
                    <td class="tableImage">
                        <img class="img-fluid w-10" src="{{asset('http://127.0.0.1:8000/storage/categories/'.$category->image)}}" alt="">
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-secondary showEditCategoryModel" categoryId='{{$category->id}}'><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-outline-danger showDeleteCategoryModel" categoryId='{{$category->id}}'><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <p class="py-3">No category added yet.</p>
                    </td>
                </tr>
                @endForelse
            </tbody>
        </table>
    </div>
</div>
@endSection

@push('scripts')
<script src="{{asset('js/admin.js')}}"></script>
@endPush