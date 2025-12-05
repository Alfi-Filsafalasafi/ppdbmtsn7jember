<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB - @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/mts7.png') }}">
    @include('layouts.scripts.css')
    @yield('link_css')
</head>

<body>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            @include('layouts.footer')
        </div>
    </div>
    @include('layouts.scripts.js')
    @yield('scripts')



</body>

</html>
