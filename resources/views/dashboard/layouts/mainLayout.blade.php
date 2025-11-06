<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageName','Blogify')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/adminStyles.css')}}">
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar bg-white shadow-sm" id="sidebar">
        <h5 class="text-center text-primary fw-bold mb-4">Blogify Admin</h5>
        <x-admin.sidebar-tabs href="{{route('dashboard.index')}}" text='Dashboard' icon='bi-house-door' />
        <x-admin.sidebar-tabs href="{{route('dashboard.index')}}" text='Posts' icon='bi-file-earmark-text' />
        <x-admin.sidebar-tabs href="{{route('dashboard.index')}}" text='Categories' icon='bi-folder' />
        <x-admin.sidebar-tabs href="{{route('dashboard.index')}}" text='Users' icon='bi-people' />
        <x-admin.sidebar-tabs href="{{route('dashboard.index')}}" text='Analytics' icon='bi-bar-chart' />
        <x-admin.sidebar-tabs href="{{route('dashboard.setting')}}" text='Settings' icon='bi-gear' />
        <x-admin.sidebar-tabs href="{{route('dashboard.index')}}" text='Logout' icon='bi-box-arrow-right' />
    </div>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top top-navbar">
        <div class="container-fluid">
            <button class="btn btn-outline-primary d-lg-none" id="sidebarToggle"><i class="bi bi-list"></i></button>
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
                        <span>Ijaz</span>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/adminScripts.js')}}"></script>
</body>

</html>