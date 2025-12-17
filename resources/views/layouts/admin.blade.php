<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageName','Blogify')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>

<body>

    <div class="modal fade" id="unauthorizedModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Unauthorized</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">You account are unauthorized for this activity..!</p>
                </div>
                <div class="modal-footer">
                    <div class="footerBtn">
                        <button type="button" class="btn btn-secondary" id='closeUnauthorized' data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar -->
    <div class="sidebar bg-white shadow-sm" id="sidebar">
        <h5 class="text-center text-primary fw-bold mb-4">Blogify Admin</h5>
        <x-admin.sidebar-tabs href="{{route('admin.index')}}" text='Dashboard' icon='bi-house-door' />
        @can('manage.blogs')
        <x-admin.sidebar-tabs href="{{route('admin.blogs.index')}}" text='Blogs' icon='bi-file-earmark-text' />
        @endcan
        @can('manage.comments')
        <x-admin.sidebar-tabs href="{{route('admin.comments.index')}}" text='Comments' icon='bi-file-earmark-text' />
        @endcan
        @can('manage.categories')
        <x-admin.sidebar-tabs href="{{route('admin.categories.index')}}" text='Categories' icon='bi-folder' />
        @endcan
        @can('manage.users')
        <x-admin.sidebar-tabs href="{{route('admin.usersAccounts.index')}}" text='Users' icon='bi-people' />
        @endcan
        @can('manage.settings')
        <x-admin.sidebar-tabs href="{{route('admin.settings')}}" text='Settings' icon='bi-gear' />
        @endcan
        <x-admin.sidebar-tabs href="{{route('auth.logout')}}" text='Logout' icon='bi-box-arrow-right' />
    </div>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top top-navbar">
        <div class="container-fluid">
            <button class="btn btn-outline-primary d-lg-none" id="sidebarToggle"><i class="bi bi-list"></i></button>
            @if(auth()->user()->status->label() === "Disable")
            <h6 class="text-danger">Your account is unverified !</h6>
            @endif
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">New comment on post</a></li>
                        <li><a class="dropdown-item" href="#">User registered</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                        <img src="https://i.pravatar.cc/40" class="rounded-circle me-2" alt="User">
                        <span>{{auth()->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="content mt-5 pt-4">
        <div class="container-fluid mt-4">
            @yield('mainContent')
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/admin.js')}}"></script>
    @stack('scripts')
</body>

</html>