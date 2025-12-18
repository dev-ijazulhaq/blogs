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

@endSection