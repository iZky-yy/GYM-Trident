<!DOCTYPE html>
<html>
<head>
    <title>PT Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<nav class="bg-blue-600 p-4 text-white">
    <a href="{{ route('pt.dashboard') }}">Dashboard PT</a>
</nav>

<div class="p-6">
    @yield('content')
</div>

</body>
</html>
