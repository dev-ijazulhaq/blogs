@extends('layouts/app')
@section('mainContent')
<div class="modal fade" id="loginNotificationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="">Login required</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">You are not login, please login to your account..!</p>
            </div>
            <div class="modal-footer">
                <div class="footerBtn">
                    <a href="{{ route('login') }}">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Login</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Section -->
<section class="hero-banner text-center">
    <div class="container hero-content">
        <h1>{{$blogDetails->title}} . {{$blogDetails->category->name}}</h1>
        <p>By {{$blogDetails->user->name}} • {{$blogDetails->created_at->format('M d, Y')}}</p>
    </div>
</section>
<!-- Blog Content -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Main Content -->
            <div class="col-lg-8 blog-content">
                <img src="{{asset('storage/Blogs/'.$blogDetails->image)}}" class="img-fluid mb-4" alt="Blog Banner">
                <p>
                    {{$blogDetails->description}}
                </p>
            </div>
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <h5>Recent Posts</h5>
                    <ul class="list-unstyled">
                        @foreach($blogTitles as $title)
                        <li><a href="{{ route('web.blog.show',$title->id) }}">→ {{$title->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Comments Section -->
<section class="py-5 border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <h4 class="mb-4">Comments</h4>

                <!-- Add Comment -->
                <div class="d-flex mb-4">
                    <img src="https://ui-avatars.com/api/?name=User" class="rounded-circle me-3" width="45" height="45" alt="User">
                    <div class="w-100">
                        <form id='commentForm' action='{{route("web.webComments.store")}}'>
                            @csrf
                            <input type="hidden" name='user_id' id='user_id' value="{{auth()->id()}}">
                            <input type="hidden" name='blog_id' value="{{$blogDetails->id}}">
                            <input type="hidden" name="parent_id" value="">
                            <label for="" class="text-danger text-sm" id='errorResponseInComment'></label>
                            <label for="" class="text-success text-sm" id='successResponseInComment'></label>
                            <textarea class="form-control mb-2" rows="2" placeholder="Write a comment..." name="comment"></textarea>
                        </form>
                        <button class="btn btn-primary btn-sm" id='postComment'>Post Comment</button>
                    </div>
                </div>
                @foreach($blogDetails->blogComments as $comment)
                <div class="d-flex mb-4">
                    <img src="https://ui-avatars.com/api/?name=User"
                        class="rounded-circle me-3" width="45" height="45">

                    <div>
                        <div class="bg-light p-3 rounded">
                            <strong>Visitor</strong>
                            <p class="mb-1">{{ $comment->comment }}</p>
                        </div>

                        <div class="small text-muted mt-1">
                            <a href="#" class="me-3">Like</a>
                            <a href="#" class="me-3">Reply</a>
                            <span>{{ $comment->created_at->diffForHumans() }}</span>
                        </div>

                        {{-- Replies --}}
                        @foreach($comment->replies as $reply)
                        <div class="d-flex ms-5 mt-3">
                            <img src="https://ui-avatars.com/api/?name=User"
                                class="rounded-circle me-3" width="40" height="40">

                            <div>
                                <div class="bg-light p-3 rounded">Visitor
                                    <p class="mb-1">{{ $reply->comment }}</p>
                                </div>

                                <div class="small text-muted mt-1">
                                    <a href="#" class="me-3">Like</a>
                                    <a href="#">Reply</a>
                                    <span>{{ $reply->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</section>

@endSection