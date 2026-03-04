<!DOCTYPE html>
<html>
<head>
    <title>Member Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<nav class="bg-green-600 p-4 text-white">
    <a href="{{ route('member.dashboard') }}">Dashboard Member</a>
</nav>

<div class="p-6">
    @yield('content')
</div>

</body>
</html>
