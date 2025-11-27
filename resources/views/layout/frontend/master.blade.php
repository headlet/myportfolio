<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
     @yield('title')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
</head>

<body class="bg-slate-900 text-slate-100" data-theme="dark">

    @include('layout.frontend.partials.nav')
    <main class="max-w-6xl mx-auto px-6 lg:px-12 ">
        @yield('contents')

    </main>
    @include('layout.frontend.partials.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('js/index.js')}}"></script>


</body>

</html>