    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Blogify</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{route('web.home')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('web.categories')}}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('web.about')}}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('web.contact')}}">Contact</a></li>
                    <li class="nav-item"><a class="btn btn-sm btn-primary mt-1" href="{{ route('admin.index') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>