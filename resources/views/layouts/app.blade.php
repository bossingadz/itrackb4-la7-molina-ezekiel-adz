<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Monster Hunter Store')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <header class="bg-dark text-white p-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3 m-0">Monster Hunter Game Store</h1>
            <span class="badge bg-secondary">Prepared by: Ezekiel Adz F. Molina</span>
        </div>
    </header>

    <div class="container mb-4">
        @include('partials._nav')
    </div>

    <main class="container pb-5">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>