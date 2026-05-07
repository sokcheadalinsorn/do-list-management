<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> 
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</html>