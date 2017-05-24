<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @hasSection('title')
            @yield('title') - CEN
        @else
            CEN
        @endif
    </title>
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
                        @if(!empty($welcomeBlock))
                            <h1 style="color: goldenrod;">{{$welcomeBlock->title}}</h1>
                            <p class="text-white">{!!nl2br(e($welcomeBlock->body))!!}</p>
                        @else
                            <h1 style="color: goldenrod;">@yield('title')</h1>
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
    <footer class="py-4 mt-5" style="background: darkslategray;">
        <div class="container text-white">
            <div class="row">
                <div class="col-4">
                    <p><a href="/"><img src="/img/cen-white-trans-logo.png" /></a></p>
                    <p>Toll Free: 888-463-7656</p>
                    <p>Local: 517-908-3900</p>
                    <p>Fax: 517-908-0703</p>
                    <p><a href="mailto:info@cenmi.org" class="text-white">info@cenmi.org</a></p>
                </div>
                <div class="col-8">
                    <nav class="nav justify-content-end">
                        <a class="nav-link text-white" href="/">Home</a>
                        <a class="nav-link text-white" href="/page/about">About</a>
                        <a class="nav-link text-white" href="/page/contact">Contact</a>
                    </nav>
                    <form class="row mt-5">
                        <div class="form-group col-9 offset-sm-1">
                            <input type="text" placeholder="Search for Information" class="form-control">
                        </div>
                        <div class="form-group col-2">
                            <button type="submit" class="btn">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="float-left">6412 Centurion Drive, Suite 130, Lansing, MI 48917</p>
                    <p class="float-right">&copy; Center for Educational Networking | <a href="/login" class="font-bold text-white">Login</a></p>
                </div>
            </div>
        </div>
    </footer>
    {{-- <script type="text/javascript" src="/js/app.js"></script> --}}
    <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>