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
            <a href="{{ route('pt.dashboard') }}"
                class="nav-item {{ request()->routeIs('pt.dashboard') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M20 11h-6c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-8c0-.55-.45-1-1-1m-1 8h-4v-6h4zm-9-4H4c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-4c0-.55-.45-1-1-1m-1 4H5v-2h4zM20 3h-6c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1m-1 4h-4V5h4zm-9-4H4c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1m-1 8H5V5h4z">
                    </path>
                </svg>
                Dashboard
            </a>
            <a href="{{ route('pt.jadwal.index') }}"
                class="nav-item {{ request()->routeIs('pt.jadwal.*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M19 4h-2V2h-2v2H9V2H7v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2M5 20V8h14V6v14z">
                    </path>
                    <path d="M12 13h5v5h-5z"></path>
                </svg>
                Jadwal
            </a>
            <a href="{{ route('pt.members.index') }}"
                class="nav-item {{ request()->routeIs('pt.members.*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M12 11c1.71 0 3-1.29 3-3s-1.29-3-3-3-3 1.29-3 3 1.29 3 3 3m0-4c.6 0 1 .4 1 1s-.4 1-1 1-1-.4-1-1 .4-1 1-1m1 5h-2c-2.76 0-5 2.24-5 5v.5c0 .83.67 1.5 1.5 1.5h9c.83 0 1.5-.67 1.5-1.5V17c0-2.76-2.24-5-5-5m-5 5c0-1.65 1.35-3 3-3h2c1.65 0 3 1.35 3 3zm-1.5-6c.47 0 .9-.12 1.27-.33a5.03 5.03 0 0 1-.42-4.52C7.09 6.06 6.8 6 6.5 6 5.06 6 4 7.06 4 8.5S5.06 11 6.5 11m-.39 1H5.5C3.57 12 2 13.57 2 15.5v1c0 .28.22.5.5.5H4c0-1.96.81-3.73 2.11-5m11.39-1c1.44 0 2.5-1.06 2.5-2.5S18.94 6 17.5 6c-.31 0-.59.06-.85.15a5.03 5.03 0 0 1-.42 4.52c.37.21.79.33 1.27.33m1 1h-.61A6.97 6.97 0 0 1 20 17h1.5c.28 0 .5-.22.5-.5v-1c0-1.93-1.57-3.5-3.5-3.5">
                    </path>
                </svg>
                Member
            </a>
            <a href="{{ route('muscles.index') }}"
                class="nav-item {{ request()->routeIs('muscles.*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M16.91 2.29a.996.996 0 0 0-1.41 0l-1.59 1.59-1.09-1.09a.996.996 0 0 0-1.41 0l-2.3 2.3c-.19.19-.29.44-.29.71s.11.52.29.71L12.6 10l-2.59 2.59L6.52 9.1a.996.996 0 0 0-1.41 0l-2.3 2.3a.996.996 0 0 0 0 1.41L3.9 13.9l-1.59 1.59a.996.996 0 0 0 0 1.41l4.8 4.8c.2.2.45.29.71.29s.51-.1.71-.29l1.59-1.59 1.09 1.09c.2.2.45.29.71.29s.51-.1.71-.29l2.3-2.3c.19-.19.29-.44.29-.71s-.11-.52-.29-.71l-3.49-3.49 2.59-2.59 3.49 3.49c.2.2.45.29.71.29s.51-.1.71-.29l2.3-2.3a.996.996 0 0 0 0-1.41l-1.09-1.09 1.59-1.59a.996.996 0 0 0 0-1.41l-4.8-4.8ZM7.8 19.59 4.41 16.2l.89-.89 3.39 3.39zm4.1-.5L4.91 12.1l.89-.89 6.99 6.99zm6.3-6.3L11.21 5.8l.89-.89 6.99 6.99zm-2-8.37 3.39 3.39-.89.89-3.39-3.39z">
                    </path>
                </svg>
                Train Guide
            </a>
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
