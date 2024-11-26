<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR System</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    @include('layouts.navbar')
    <main class="container mx-auto py-6 flex-1">
        @yield('content')
    </main>
    @vite('resources/js/app.js')
</body>
</html>
