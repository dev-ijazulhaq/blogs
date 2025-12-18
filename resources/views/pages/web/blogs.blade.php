@extends('layouts.app')

@section('mainContent')

<!-- Hero Section -->
<section class="hero-section text-center">
    <div class="container hero-content">
        <h1>All Blogs</h1>
        <p>Browse through all our blogs — stay updated with latest tech, design, and development insights.</p>
    </div>
</section>

<!-- Blog Cards -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($blogs as $blog)
            <!-- Blog Card Placeholder -->
            <div class="col-md-6 col-lg-4">
                <div class="card blog-card h-100">
                    <img src="{{ asset('storage/Blogs/'.$blog->image) }}" class="card-img-top" alt="Blog Image">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">{{$blog->title}}</h5>
                            <p class="font-sm text-secondary">{{$blog->category->name}}</p>
                        </div>
                        <p class="card-text text-muted">{{Str::of($blog->description)->limit(64)}}</p>
                        <a href="{{ route('web.blog.show',$blog->id) }}" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <small class="text-muted">By {{$blog->user->name}} • {{$blog->created_at->format('M d, Y')}}</small>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p>Blog is not published yet..!</p>
            </div>
            @endforelse
            <!-- Repeat Blog Card Placeholder as needed -->
        </div>
    </div>
</section>

@endsection