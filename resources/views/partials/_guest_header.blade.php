<div class="header">
    <div class="top_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="select_main">
                        <div class="sign">
                            @auth
                                <span><a href="{{ route('dashboard') }}">My Account</a></span>
                            @endauth

                            @guest
                                <span><a href="{{ route('login') }}">Login</a></span>
                                <span class="ml-4"><a href="{{ route('register') }}">Sign Up</a></span>
                            @endguest
                        </div>

                        <ul class="top_infomation">
                            <li><img src="{{ asset('images/ti_call.png') }}" alt="#"/>Call : +1234567890</li>
                            <li><img src="{{ asset('images/ti_mail.png') }}" alt="#"/><a href="mailto:demo@example.com">demo@example.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header_midil">
        <div class="container">
            <div class="row d_flex">
                <div class=" col-md-2 col-sm-3 logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="{{ route('homePage') }}">
                                    @include('partials._logo')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9 col-md-8">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item @if (request()->route()->getName() == 'homePage') active @endif">
                                    <a class="nav-link" href="{{ route('homePage') }}">Home</a>
                                </li>
                                <li class="nav-item @if (request()->route()->getName() == 'pages.about') active @endif">
                                    <a class="nav-link" href="{{ route('pages.about') }}">About</a>
                                </li>
                                <li class="nav-item @if (request()->route()->getName() == 'pages.packages') active @endif">
                                    <a class="nav-link" href="{{ route('pages.packages') }}">Packages</a>
                                </li>
                                <li class="nav-item @if (request()->route()->getName() == 'pages.contact') active @endif">
                                    <a class="nav-link" href="{{ route('pages.contact') }}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="col-md-2 d_none">
                    <ul class="email text_align_right">
                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i>   </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
