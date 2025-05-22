<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CoreUI CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.0/dist/css/coreui.min.css" rel="stylesheet">
</head>
<body class="c-app">
    <!-- Topbar -->
<header class="c-header c-header-light c-header-fixed border-bottom">
    <div class="container d-flex justify-content-between align-items-center py-2">
        <!-- Logo & Menu -->
        <div class="d-flex align-items-center">
            <a class="navbar-brand fs-4 fw-bold text-dark me-4" href="{{ route('dashboard') }}">{{ config('app.name') }}</a>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ route('expenses') }}">Expenses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ route('budgets') }}">Budgets</a>
                </li>
            </ul>
        </div>

        <!-- User Menu -->
        <div class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center" href="#" id="userMenu" role="button" data-coreui-toggle="dropdown">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff&rounded=true&size=32" class="rounded-circle me-2" alt="avatar">
                <span class="fw-semibold text-dark">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                <li><a class="dropdown-item" href="#"><i class="cil-user me-2"></i>Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit"><i class="cil-power me-2"></i>Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>

<div class="c-wrapper">
        <main class="c-main pt-4">
            <div class="container">
                @yield('content')
            </div>
        </main>


    </div>

    <!-- CoreUI JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.0/dist/js/coreui.bundle.min.js"></script>
</body>
</html>