<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Volunteer Site</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/mdb.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>


<!--Navbar-->
<nav class="navbar navbar-dark primary-color-dark">

    <!-- Collapse button-->
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
        <i class="fa fa-bars"></i>
    </button>

    <div class="container">

        <!--Collapse content-->
        <div class="collapse navbar-toggleable-xs" id="collapseEx">
            <!--Navbar Brand-->
            <a class="navbar-brand" href="/">HelpCape</a>
            <!--Links-->
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/listings">Listings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/organizations">Organizations</a>
                </li>
                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            &nbsp;{{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="{{ url('/dashboard') }}"><i
                                        class="fa fa-btn fa-tachometer"></i> Dashboard</a>
                            @if (Auth::user()->organization_id != null)
                                <a class="dropdown-item"
                                   href="{{ url('/organizations/' . Auth::user()->organization_id) }}">
                                    <i class="fa fa-btn fa-building"></i> {{ Auth::user()->organization->name }}
                                </a>
                            @endif
                            <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>
                                Logout</a>
                        </div>
                    </li>
                @endif
            </ul>
            <!--Search form-->
        </div>
        <!--/.Collapse content-->

    </div>

</nav>
<!--/.Navbar-->


@yield('carousel')
<div style="padding-top: 30px;">
    @yield('content')
</div>

<footer class="page-footer center-on-small-only">

    <div class="call-to-action">
        <h4>HelpCape</h4>
    </div>

    <div class="footer-copyright">
        <div class="container-fluid">
            Copyright © 2016<br>Image credits to Southeast Missourian, Yelp!, and Google.
        </div>
    </div>

</footer>

<script type="text/javascript" src="/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="/js/tether.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/mdb.min.js"></script>
</body>

</html>