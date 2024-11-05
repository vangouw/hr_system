<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>HR System</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-6">
        @yield('content')
    </div>
    @vite('resources/js/app.js')
</body>
</html>
