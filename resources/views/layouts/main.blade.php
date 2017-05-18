<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CEN - @yield('title', 'Homepage')</title>
    <link rel="stylesheet" href="/css/master.css">
</head>
<body>
    @if(Auth::user())
        @include('partials.adminNavbar')
    @endif

    @include('partials.navbar')

    <main class="container{{ Auth::user() ? ' admin-bar' : '' }}">
        <div class="row">
            @hasSection('sidebar')
                <div class="col-md-8">
                    @yield('content')
                </div>
                <div class="col-md-4">
                    @yield('sidebar')
                </div>
            @else
                <div class="col-md-12">
                    @yield('content')
                </div>
            @endif
        </div>
    </main>
    {{-- <script type="text/javascript" src="/js/app.js"></script> --}}
    <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>