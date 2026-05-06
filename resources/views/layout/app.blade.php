<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>App</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="flex w-full">
        <!-- Sidebar Component -->
        <x-sidebar />

        <!-- Page Content -->
        <div class="flex-1 p-5">
            {{ $slot }}
        </div>
    </div>


</body>

</html>