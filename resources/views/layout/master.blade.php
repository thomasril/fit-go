<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fitgo - Cari Tempat Olahraga dengan mudah dan cepat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link href="{{asset('images/icon-white.png')}}" rel="icon">
    <link href="{{asset('images/icon-white.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap CSS File -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="/">
        <img src = "{{asset('images/logo-white.png')}}" style = "width: 50px; height: 50px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class=" navbar-nav ml-auto">
            @if(Auth::check())
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item {{ Request::is('search') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/search') }}">Cari</a>
                </li>
                @if(Auth::user()->role->name == 'Owner')
                    @if(Auth::user()->property != null)
                    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item {{ Request::is('property') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/property') }}">Jadwal</a>
                    </li>
                    @else
                        <li class="nav-item {{ Request::is('property/insert') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/property/insert') }}">Masukkan Tempat Olahraga</a>
                        </li>
                    @endif
                @elseif(Auth::user()->role->name == 'Customer')
                    <li class="nav-item {{ Request::is('book/history') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/book/history') }}">Histori Pemesanan</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mengelola
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('/admin/property/manage') }}">Properti</a>
                            <a class="dropdown-item" href="{{ url('/admin/sport/manage') }}">Olahraga</a>
                            <a class="dropdown-item" href="{{ url('/admin/bank/manage') }}">Bank</a>
                        </div>
                    </li>
                @endif
            @endif

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Auth::user())
                        {{ Auth::user()->name }}
                    @else
                        Tamu
                    @endif
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @if(Auth::user())
                        <a class="dropdown-item" href="{{ url('/logout') }}">Keluar</a>
                    @else
                        <a class="dropdown-item" href="{{ url('/login') }}">Masuk</a>
                        <a class="dropdown-item" href="{{ url('/register') }}">Daftar</a>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav>

@yield('jumbotron')

<div class="container content">
    @yield('container')
</div>

<section id="footer">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <h5>Quick links</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="/"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a href="/login"><i class="fa fa-angle-double-right"></i>Login</a></li>
                    <li><a href="/register"><i class="fa fa-angle-double-right"></i>Register</a></li>
                    <li><a href="/property"><i class="fa fa-angle-double-right"></i>Property</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <h5>Quick links</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                </ul>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="list-unstyled list-inline social text-center">
                    <li class="list-inline-item"><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href=""><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            </hr>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p>&copy All right Reversed.<a class=" ml-2" href="https://www.marioviegash.com" target="_blank">TOMVED</a></p>
            </div>
            </hr>
        </div>
    </div>
</section>

</body>

<script src="{{asset('js/jquery-latest.min.js')}}"></script>
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script>
    var pusher = new Pusher('176eae996f1d611a171c', {
        cluster: 'ap1',
        forceTLS: true
    });

    var channel = pusher.subscribe('reminder-channel');

    channel.bind('reminder-event', function(data) {
        alert('Muncul dong');
    });
</script>
@yield('script')
</html>
