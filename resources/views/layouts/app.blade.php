<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="@yield('description')">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <meta name="author" href="humans.txt">

    <link href="favicon.png" rel="icon" type="image/png">
    <title>{!! config('app.name', 'Laravel') !!} - @yield('title')</title>

    <!-- Prefetching -->
    <link href="https://fonts.gstatic.com" rel="dns-prefetch">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com" rel="dns-prefetch">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://cdnjs.cloudflare.com" rel="dns-prefetch">
    <link href="https://cdnjs.cloudflare.com" rel="preconnect">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet" media="all">
</head>
<body>
    @include('layouts.nav')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    <!--[if gte IE 10]><!-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--<![endif]-->
    <!--[if lte IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>
