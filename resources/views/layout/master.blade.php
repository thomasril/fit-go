<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fitgo - Cari Tempat Olahraga dengan mudah dan cepat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link href="" rel="icon">
    <link href="" rel="apple-touch-icon">

    <!-- Bootstrap CSS File -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Fitgo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class=" navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Histori</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Chat</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Halaman Profi</a>
                    <a class="dropdown-item" href="#">Keluar</a>
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
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script>
    @yield('script')
</script>
</html>
