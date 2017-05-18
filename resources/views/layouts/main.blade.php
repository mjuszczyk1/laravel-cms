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
    <header style="background: url('img/hpbg.jpg') no-repeat center center; background-size: cover;">
        <div style="background-color: rgba(0,60,145,0.8);">
            @include('partials.navbar')
            <div class="container" style="padding:50px 15px;">
                <div class="row">
                    <div class="col-8 offset-sm-2 text-center">
                        @if(!empty($isFront) && $isFront && !empty($welcomeBlock))
                            <h1 style="color: goldenrod;">{{$welcomeBlock[0]->title}}</h1>
                            <p class="text-white">{!!nl2br(e($welcomeBlock[0]->body))!!}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>

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