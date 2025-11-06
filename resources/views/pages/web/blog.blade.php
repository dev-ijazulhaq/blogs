@extends('layouts/app')
@section('mainContent')
<!-- Hero Section -->
<section class="hero-banner text-center">
    <div class="container hero-content">
        <h1>Getting Started with Laravel 12</h1>
        <p>By Ijaz • Nov 5, 2025</p>
    </div>
</section>

<!-- Blog Content -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Main Content -->
            <div class="col-lg-8 blog-content">
                <img src="https://picsum.photos/900/400?random=3" class="img-fluid mb-4" alt="Blog Banner">
                <p>
                    Laravel 12 introduces exciting new features and performance optimizations, making development
                    faster and more efficient than ever before. It enhances dependency injection, improves routing
                    speed, and simplifies common development workflows.
                </p>
                <p>
                    In this article, we’ll walk you through setting up a fresh Laravel 12 project, exploring its new
                    features, and understanding how it differs from previous versions. By the end, you’ll be ready
                    to leverage the full potential of Laravel’s latest release in your own projects.
                </p>
                <p>
                    Laravel’s flexibility, elegant syntax, and vibrant ecosystem make it one of the most popular PHP
                    frameworks for web development today. With each release, it continues to evolve to meet modern
                    development standards.
                </p>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <h5>Recent Posts</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">→ Mastering Bootstrap 5 Grid System</a></li>
                        <li><a href="#">→ PHP 8.3 New Features</a></li>
                        <li><a href="#">→ Laravel API Authentication with Sanctum</a></li>
                        <li><a href="#">→ Building RESTful APIs Professionally</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endSection