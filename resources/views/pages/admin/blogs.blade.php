@extends('layouts.admin')

@section('pageName') Blogify Home @endSection

@section('mainContent')
<div class="mainContainer">
    <!-- Dashboard Cards -->
    <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add new blog</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id='blogForm' enctype="multipart/form-data" action="{{route('admin.blogs.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="col-form-label">Title:</label>
                            <label for="" class="validationError" id='responseTitle'></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title of the blog">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Description:</label>
                            <label for="" class="validationError" id='responseDescription'></label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description of the blog"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="col-form-label">Category:</label>
                            <label for="" class="validationError" id='responseCategory'></label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" disabled selected>Select Category</option>
                                @foreach($userBlogs['categories'] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Image</label>
                            <label for="" class="validationError" id='responseImage'></label>
                            <input type="file" class="form-control" id='blogImage' name="image">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='addBlog'>Save</button>
                </div>
                <div class="blogInsertResponse text-center text-success pb-4 insertResponse"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editPostModalLabel">Update blog</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id='blogUpdateForm' enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id='editBlogId' name="id">
                        <input type="hidden" id='oldImgName' name='oldImg'>
                        <div class="mb-3">
                            <label for="title" class="col-form-label">Title:</label>
                            <label for="" class="validationError" id='responseUpdateTitle'></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title of the blog">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Description:</label>
                            <label for="" class="validationError" id='responseUpdateDescription'></label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description of the blog"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="col-form-label">Category:</label>
                            <label for="" class="validationError" id='responseUpdateCategory'></label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" disabled selected>Select Category</option>
                                @foreach($userBlogs['categories'] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Image</label>
                            <label for="" class="validationError" id='responseUpdateImage'></label>
                            <input type="file" class="form-control" id='blogImage' name="image">
                        </div>
                        <div class="mb-3">
                            <img src="" alt="" id='updateBlogImagePreview' class="img-fluid w-25">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='updateBlog'>Update</button>
                </div>
                <div class="blogInsertResponse text-center text-success pb-4 insertResponse"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteBlogModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Delete blog</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id='deleteBlogForm'>
                        @csrf
                        <input type="hidden" id="deleteBlogId" name="id">
                    </form>
                    <p class="text-center">Are you sure want to delete this Blog?</p>
                </div>
                <div class="modal-footer">
                    <div class="footerBtn">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id='deleteBlog'>Delete</button>
                    </div>
                </div>
                <div class="text-center text-primary pb-4 deleteBlogResponse"></div>
            </div>
        </div>
    </div>

    <!-- Recent Posts Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h6 class="fw-bold mb-0">Recent Posts</h6>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">Add new</button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($userBlogs['blogs'] as $index => $blog)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$blog->created_at}}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->category->name}}</td>
                        <td>{{$blog->description}}</td>
                        <td class="tableImage">
                            <img src="{{asset('storage/Blogs/'.$blog->image)}}" alt="">
                        </td>
                        <td><span class="badge {{$blog->is_publish->color()}}">{{$blog->is_publish->label()}}</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary viewUpdateBlog" blogId="{{$blog->id}}"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger viewDeleteBlog" blogId="{{$blog->id}}"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">
                            <p class="text-center mt-2">You have no any post yet..!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endSection