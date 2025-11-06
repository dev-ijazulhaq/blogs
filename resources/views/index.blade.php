<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogify - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .blog-card img {
            height: 200px;
            object-fit: cover;
            border-radius: 0.5rem 0.5rem 0 0;
        }

        .navbar-brand {
            font-weight: 700;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-primary" href="#">Blogify</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="btn btn-sm btn-dark mt-1" href="{{route('dashboard.index')}}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="py-5 text-center bg-light">
        <div class="container">
            <h1 class="fw-bold">Welcome to Blogify</h1>
            <p class="text-muted">Your daily dose of tech, design, and development articles.</p>
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
                            <a href="{{route('blog')}}" class="btn btn-outline-primary btn-sm">Read More</a>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <small class="text-muted">By Ijaz • Nov 5, 2025</small>
                        </div>
                    </div>
                </div>
                <!-- Repeat more cards -->
                <div class="col-md-6 col-lg-4">
                    <div class="card blog-card h-100">
                        <img src="https://picsum.photos/600/400?random=2" class="card-img-top" alt="Blog Image">
                        <div class="card-body">
                            <h5 class="card-title">Bootstrap 5 Tips for Modern UI</h5>
                            <p class="card-text text-muted">Improve your UI with modern Bootstrap 5 features and components.</p>
                            <a href="{{route('blog')}}" class="btn btn-outline-primary btn-sm">Read More</a>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <small class="text-muted">By Admin • Oct 30, 2025</small>
                        </div>
                    </div>
                </div>
                <!-- Add as many cards as you want -->
                <div class="col-md-6 col-lg-4">
                    <div class="card blog-card h-100">
                        <img src="https://picsum.photos/600/400?random=3" class="card-img-top" alt="Blog Image">
                        <div class="card-body">
                            <h5 class="card-title">Bootstrap 5 Tips for Modern UI</h5>
                            <p class="card-text text-muted">Improve your UI with modern Bootstrap 5 features and components.</p>
                            <a href="{{route('blog')}}" class="btn btn-outline-primary btn-sm">Read More</a>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <small class="text-muted">By Admin • Oct 30, 2025</small>
                        </div>
                    </div>
                </div>
                <!-- Add as many cards as you want -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white text-center py-4 border-top">
        <p class="mb-0 text-muted">&copy; 2025 Blogify. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>