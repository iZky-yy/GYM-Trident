<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/logo.png')}}">
    <title>GYM TRIDENT PT</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>

<body>

    <div class="sidebar">
        <h1 class="brand">GYM TRIDENT PT</h1>

        <p class="menu-label">Main Menu</p>
        <nav class="nav-menu">
            <a href="{{ route('pt.dashboard') }}" class="nav-item {{ request()->routeIs('pt.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('membership.index') }}" class="nav-item {{ request()->routeIs('pt.dashboard') ? 'active' : '' }}">Membership</a>
            <a href="{{ route('members.index') }}" class="nav-item">Profile</a>
        </nav>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout" style="background:none;border:none;">
                🚪 Logout Session
            </button>
        </form>
    </div>
    @yield('content')
</body>

</html>
