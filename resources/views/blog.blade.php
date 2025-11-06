<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogify - Blog Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <li class="nav-item"><button class="btn btn-sm btn-dark mt-1" href="">Login</button></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Blog Content -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <h1 class="fw-bold mb-3">Getting Started with Laravel 12</h1>
                    <p class="text-muted">By Ijaz • Nov 5, 2025</p>
                    <img src="https://picsum.photos/900/400?random=3" class="img-fluid rounded mb-4" alt="Blog Banner">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus urna sed commodo aliquet...</p>
                    <p>Laravel 12 brings exciting improvements such as enhanced performance, cleaner syntax, and more efficient dependency injection...</p>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="bg-light p-4 rounded">
                        <h5 class="fw-bold mb-3">Recent Posts</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-decoration-none text-dark">→ Mastering Bootstrap 5 Grid System</a></li>
                            <li><a href="#" class="text-decoration-none text-dark">→ PHP 8.3 New Features</a></li>
                            <li><a href="#" class="text-decoration-none text-dark">→ Laravel API Authentication with Sanctum</a></li>
                        </ul>
                    </div>
                </div>
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