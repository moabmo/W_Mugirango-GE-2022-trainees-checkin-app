<!-- resources/views/admin/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <!-- Include your CSS here -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.reports.index') }}">Reports</a></li>
                <!-- Add more sidebar links as needed -->
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <header>
                <h1>@yield('header', 'Admin Panel')</h1>
            </header>
            <section>
                @yield('content')
            </section>
        </main>
    </div>

    <!-- Include your JavaScript here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
