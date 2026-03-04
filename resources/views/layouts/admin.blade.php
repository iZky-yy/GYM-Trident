<!DOCTYPE html>
<html>
<head>
    <title>Admin - Gym System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="flex">

    <aside class="w-64 bg-gray-800 text-white min-h-screen p-4">
        <h2 class="text-xl font-bold mb-6">Admin Panel</h2>

        <ul class="space-y-3">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('paket.index') }}">Paket Gym</a></li>
            <li><a href="{{ route('member.index') }}">Member</a></li>
            <li><a href="{{ route('pt.index') }}">PT</a></li>
            <li><a href="{{ route('admin.rekap') }}">Rekap</a></li>
        </ul>
    </aside>

    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>

</body>
</html>
