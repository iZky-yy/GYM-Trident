<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GT ADMIN | Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>
<body>

    <div class="sidebar">
        <h1 class="brand">GT ADMIN</h1>

        <p class="menu-label">Main Menu</p>
        <nav class="nav-menu">
            <a href="#" class="nav-item active">📊 Dashboard</a>
            <a href="#" class="nav-item">👥 Members</a>
            <a href="#" class="nav-item">🏋️ Trainers</a>
            <a href="#" class="nav-item">📅 Schedules</a>
            <a href="#" class="nav-item">💰 Payments</a>
            <a href="#" class="nav-item">⚙️ Settings</a>
        </nav>

        <a href="#" class="logout">🚪 Logout Session</a>
    </div>
 @yield('content')
</body>
</html>
