<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Inline script to prevent FOUC (Flash of Unstyled Content) -->
    <script>
        (function() {
            if (localStorage.getItem('theme') === 'dark') {
                document.documentElement.classList.remove('light');
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
                document.documentElement.classList.add('light');
            }
        })();
    </script>
    <script async src="{{ asset('/backend/flyonui.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('backend/apexcharts/src/assets/apexcharts.css') }}" />

</head>

{{-- <script async src="/node_modules/flyonui/dist/accordion.js"></script> --}}

<body class="min-h-screen flex flex-col">
    <div class="wrapper">
        @include('backend.layout.header')

        <div class="flex min-h-screen">
            @include('backend.layout.sidebar')
            <div class="flex-1 sm:ml-64 pt-25">
                <main class="p-6">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>


    <script src="{{ asset('backend/apexcharts/dist/apexcharts.js') }}"></script>
    <script src="{{ asset('backend/lodash/lodash.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>

</body>


</html>
