<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.png') }}">
    <title>GYM TRIDENT ADMIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="sidebar">
        <h1 class="brand">GYM TRIDENT ADMIN</h1>

        <p class="menu-label">Main Menu</p>
        <nav class="nav-menu">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M20 11h-6c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-8c0-.55-.45-1-1-1m-1 8h-4v-6h4zm-9-4H4c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-4c0-.55-.45-1-1-1m-1 4H5v-2h4zM20 3h-6c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1m-1 4h-4V5h4zm-9-4H4c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1m-1 8H5V5h4z">
                    </path>
                </svg>
                Dashboard
            </a>
            <a href="{{ route('paket.index') }}" class="nav-item {{ request()->routeIs('paket.*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M21.93 7.66c-.02-.05-.04-.11-.07-.16a1 1 0 0 0-.06-.08c-.03-.04-.06-.09-.1-.12-.03-.03-.06-.04-.09-.07-.04-.03-.07-.06-.11-.09h-.01l-9-5.01a.99.99 0 0 0-.97 0l-9.01 5H2.5c-.04.02-.07.06-.11.09a.6.6 0 0 0-.09.07c-.04.04-.07.08-.1.12-.02.03-.05.05-.06.08-.03.05-.05.1-.07.16-.01.03-.03.05-.03.08-.02.08-.04.17-.04.26v8c0 .36.2.7.51.87l9 5 .15.06c.03.01.06.03.09.03a1.1 1.1 0 0 0 .5 0c.03 0 .06-.02.09-.03.05-.02.1-.03.15-.06l9-5c.32-.18.51-.51.51-.87v-8c0-.09-.01-.18-.04-.26 0-.03-.02-.05-.03-.08ZM12 4.15l6.94 3.86-2.44 1.36-6.94-3.86zm-4.5 2.5 6.94 3.86L12 11.87 5.06 8.01zM4 9.71l7 3.89v5.71l-7-3.89zm16 5.71-7 3.89V13.6l2.5-1.39v3.21l2-1.11V11.1L20 9.71z">
                    </path>
                </svg>
                Paket Gym
            </a>
            <a href="{{ route('member.index') }}" class="nav-item {{ request()->routeIs('member.*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M12 11c1.71 0 3-1.29 3-3s-1.29-3-3-3-3 1.29-3 3 1.29 3 3 3m0-4c.6 0 1 .4 1 1s-.4 1-1 1-1-.4-1-1 .4-1 1-1m1 5h-2c-2.76 0-5 2.24-5 5v.5c0 .83.67 1.5 1.5 1.5h9c.83 0 1.5-.67 1.5-1.5V17c0-2.76-2.24-5-5-5m-5 5c0-1.65 1.35-3 3-3h2c1.65 0 3 1.35 3 3zm-1.5-6c.47 0 .9-.12 1.27-.33a5.03 5.03 0 0 1-.42-4.52C7.09 6.06 6.8 6 6.5 6 5.06 6 4 7.06 4 8.5S5.06 11 6.5 11m-.39 1H5.5C3.57 12 2 13.57 2 15.5v1c0 .28.22.5.5.5H4c0-1.96.81-3.73 2.11-5m11.39-1c1.44 0 2.5-1.06 2.5-2.5S18.94 6 17.5 6c-.31 0-.59.06-.85.15a5.03 5.03 0 0 1-.42 4.52c.37.21.79.33 1.27.33m1 1h-.61A6.97 6.97 0 0 1 20 17h1.5c.28 0 .5-.22.5-.5v-1c0-1.93-1.57-3.5-3.5-3.5">
                    </path>
                </svg>
                Member
            </a>
            <a href="{{ route('personaltrainer.index') }}"
                class="nav-item {{ request()->routeIs('personaltrainer.*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path d="M12 2a2 2 0 1 0 0 4 2 2 0 1 0 0-4M4 9h5v13h2v-7h2v7h2V9h5V7H4z"></path>
                </svg>
                Personal Trainer
            </a>
            <a href="{{ route('admin.transaksi') }}"
                class="nav-item {{ request()->routeIs('admin.transaksi') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M21 11h-3V5c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v13c0 1.65 1.35 3 3 3h14c1.65 0 3-1.35 3-3v-6c0-.55-.45-1-1-1M5 19c-.55 0-1-.45-1-1V5h12v13a3 3 0 0 0 .17 1zm15-1c0 .55-.45 1-1 1s-1-.45-1-1v-5h2z">
                    </path>
                    <path d="M6 7h8v2H6zm0 4h8v2H6zm5 4h3v2h-3z"></path>
                </svg>
                Transaksi
            </a>
            <a href="{{ route('sesi.index') }}"
                class="nav-item {{ request()->routeIs('admin.sesi') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M19 4h-2V2h-2v2H9V2H7v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2M5 20V8h14V6v14z">
                    </path>
                    <path d="M12 13h5v5h-5z"></path>
                </svg>
                Sesi
            </a>
            <a href="{{ route('admin.rekap') }}"
                class="nav-item {{ request()->routeIs('admin.rekap') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path d="M8 6h9v2H8z"></path>
                    <path
                        d="M20 2H6C4.35 2 3 3.35 3 5v14c0 1.65 1.35 3 3 3h15v-2H6c-.55 0-1-.45-1-1s.45-1 1-1h14c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1m-6 14H6c-.35 0-.69.07-1 .18V5c0-.55.45-1 1-1h13v12z">
                    </path>
                </svg>
                Rekap
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
