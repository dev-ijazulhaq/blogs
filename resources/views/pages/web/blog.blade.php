@extends('layouts/app')
@section('mainContent')
<!-- Hero Section -->
<section class="hero-banner text-center">
    <div class="container hero-content">
        <h1>{{$blog->title}} . {{$blog->category->name}}</h1>
        <p>By {{$blog->user->name}} • {{$blog->created_at->format('M d, Y')}}</p>
    </div>
</section>
<!-- Blog Content -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Main Content -->
            <div class="col-lg-8 blog-content">
                <img src="{{asset('storage/Blogs/'.$blog->image)}}" class="img-fluid mb-4" alt="Blog Banner">
                <p>
                    {{$blog->description}}
                </p>
            </div>
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <h5>Recent Posts</h5>
                    <ul class="list-unstyled">
                        @foreach($recentTitles as $titles)
                        <li><a href="{{route('web.blog.show', $titles->id)}}">→ {{$titles->title}}</a></li>
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
                    <div class="flex-grow-1">
                        <textarea class="form-control mb-2" rows="2" placeholder="Write a comment..."></textarea>
                        <button class="btn btn-primary btn-sm">Post Comment</button>
                    </div>
                </div>

                <!-- Comment Item -->
                <div class="d-flex mb-4">
                    <img src="https://ui-avatars.com/api/?name=John+Doe" class="rounded-circle me-3" width="45" height="45" alt="User">
                    <div>
                        <div class="bg-light p-3 rounded">
                            <strong>John Doe</strong>
                            <p class="mb-1">
                                This is a really informative blog. Thanks for sharing!
                            </p>
                        </div>
                        <div class="small text-muted mt-1">
                            <a href="#" class="me-3 text-decoration-none">Like</a>
                            <a href="#" class="me-3 text-decoration-none">Reply</a>
                            <span>2 hours ago</span>
                        </div>
                    </div>
                </div>

                <!-- Reply Comment -->
                <div class="d-flex ms-5 mb-4">
                    <img src="https://ui-avatars.com/api/?name=Sarah+Ali" class="rounded-circle me-3" width="40" height="40" alt="User">
                    <div>
                        <div class="bg-light p-3 rounded">
                            <strong>Sarah Ali</strong>
                            <p class="mb-1">
                                Totally agree with you 👍
                            </p>
                        </div>
                        <div class="small text-muted mt-1">
                            <a href="#" class="me-3 text-decoration-none">Like</a>
                            <a href="#" class="text-decoration-none">Reply</a>
                            <span>1 hour ago</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endSection