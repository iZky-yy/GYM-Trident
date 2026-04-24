<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.png') }}">
    <title>GYM TRIDENT MEMBER</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>

<body>

    <div class="sidebar">
        <h1 class="brand">GYM TRIDENT MEMBER</h1>

        <p class="menu-label">Main Menu</p>
        <nav class="nav-menu">
            <a href="{{ route('member.dashboard') }}"
                class="nav-item {{ request()->routeIs('member.dashboard') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M20 11h-6c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-8c0-.55-.45-1-1-1m-1 8h-4v-6h4zm-9-4H4c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-4c0-.55-.45-1-1-1m-1 4H5v-2h4zM20 3h-6c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1m-1 4h-4V5h4zm-9-4H4c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1m-1 8H5V5h4z">
                    </path>
                </svg>
                Dashboard</a>
            <a href="{{ route('membership.index') }}"
                class="nav-item {{ request()->routeIs('membership.*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M21.93 7.66c-.02-.05-.04-.11-.07-.16a1 1 0 0 0-.06-.08c-.03-.04-.06-.09-.1-.12-.03-.03-.06-.04-.09-.07-.04-.03-.07-.06-.11-.09h-.01l-9-5.01a.99.99 0 0 0-.97 0l-9.01 5H2.5c-.04.02-.07.06-.11.09a.6.6 0 0 0-.09.07c-.04.04-.07.08-.1.12-.02.03-.05.05-.06.08-.03.05-.05.1-.07.16-.01.03-.03.05-.03.08-.02.08-.04.17-.04.26v8c0 .36.2.7.51.87l9 5 .15.06c.03.01.06.03.09.03a1.1 1.1 0 0 0 .5 0c.03 0 .06-.02.09-.03.05-.02.1-.03.15-.06l9-5c.32-.18.51-.51.51-.87v-8c0-.09-.01-.18-.04-.26 0-.03-.02-.05-.03-.08ZM12 4.15l6.94 3.86-2.44 1.36-6.94-3.86zm-4.5 2.5 6.94 3.86L12 11.87 5.06 8.01zM4 9.71l7 3.89v5.71l-7-3.89zm16 5.71-7 3.89V13.6l2.5-1.39v3.21l2-1.11V11.1L20 9.71z">
                    </path>
                </svg>
                Membership
            </a>
            <a href="{{ route('transaksi.index') }}"
                class="nav-item {{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M21 11h-3V5c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v13c0 1.65 1.35 3 3 3h14c1.65 0 3-1.35 3-3v-6c0-.55-.45-1-1-1M5 19c-.55 0-1-.45-1-1V5h12v13a3 3 0 0 0 .17 1zm15-1c0 .55-.45 1-1 1s-1-.45-1-1v-5h2z">
                    </path>
                    <path d="M6 7h8v2H6zm0 4h8v2H6zm5 4h3v2h-3z"></path>
                </svg>
                Transaksi
            </a>
            <a href="{{ route('member.jadwal.index') }}"
                class="nav-item {{ request()->routeIs('member.jadwal.*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M19 4h-2V2h-2v2H9V2H7v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2M5 20V8h14V6v14z">
                    </path>
                    <path d="M12 13h5v5h-5z"></path>
                </svg>
                Jadwal
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
