<!-- resources/views/layouts/master.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Add your additional head elements (stylesheets, scripts, etc.) here -->
</head>
<body>

    <header>
        <h1>My Website Header</h1>
        <!-- Add any header content or navigation here -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2024 My Website. All rights reserved.</p>
        <!-- Add any footer content or links here -->
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>
</html>
