@extends('layouts.app')

@section('mainContent')
<section class="hero-section text-center">
    <div class="container hero-content">
        <h1>Welcome to Blogify</h1>
        <p>Your daily dose of tech, design, and development insights — stay inspired and grow with us.</p>
    </div>
</section>

<!-- Blog Cards -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Blog Card -->
            <div class="col-md-6 col-lg-4">
                <div class="card blog-card h-100">
                    <img src="https://picsum.photos/600/400?random=1" class="card-img-top" alt="Blog Image">
                    <div class="card-body">
                        <h5 class="card-title">Getting Started with Laravel 12</h5>
                        <p class="card-text text-muted">Learn how to set up and configure your first Laravel 12 project step-by-step.</p>
                        <a href="{{ route('web.blog') }}" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <small class="text-muted">By Ijaz • Nov 5, 2025</small>
                    </div>
                </div>
            </div>

            <!-- Blog Card -->
            <div class="col-md-6 col-lg-4">
                <div class="card blog-card h-100">
                    <img src="https://picsum.photos/600/400?random=2" class="card-img-top" alt="Blog Image">
                    <div class="card-body">
                        <h5 class="card-title">Bootstrap 5 Tips for Modern UI</h5>
                        <p class="card-text text-muted">Enhance your UI with modern Bootstrap 5 features and best practices.</p>
                        <a href="{{ route('web.blog') }}" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <small class="text-muted">By Admin • Oct 30, 2025</small>
                    </div>
                </div>
            </div>

            <!-- Blog Card -->
            <div class="col-md-6 col-lg-4">
                <div class="card blog-card h-100">
                    <img src="https://picsum.photos/600/400?random=3" class="card-img-top" alt="Blog Image">
                    <div class="card-body">
                        <h5 class="card-title">Mastering RESTful APIs in Laravel</h5>
                        <p class="card-text text-muted">A comprehensive guide to building scalable REST APIs using Laravel’s resource controllers.</p>
                        <a href="{{ route('web.blog') }}" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <small class="text-muted">By Ijaz • Oct 25, 2025</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endSection