<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TODO">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <link href="http://fonts.googleapis.com" rel="dns-prefetch">
    <link href="http://fonts.googleapis.com" rel="preconnect">

    <title>{!! config('app.name', 'Laravel') !!}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet" media="all">

    <link href="favicon.ico" rel="icon" type="image/png">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @include('layouts.nav')
    
    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    <script src="/js/app.js"></script>
</body>
</html>
