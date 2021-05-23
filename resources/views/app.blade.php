<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }} @if(isset($pageTitle)) {{ " | ".$pageTitle }} @endif</title>

        <!-- Fonts -->
        {!! Html::style("https://fonts.googleapis.com/css?family=Maven+Pro") !!}

        <!-- Scripts -->
        {!! Html::script('js/app.js') !!}
        <!-- Styles -->
        {!! Html::style('css/app.css') !!}
        {!! Html::style('fontawesome/css/all.css') !!}

        <style>
            html, body {
                background-color: #fff;
                font-family: 'Maven Pro', sans-serif;
            }

            a {
                color: {{ env('BRAND_COLOUR_1') }};
            }

            a:hover {
                color: {{ env('BRAND_COLOUR_2') }};
            }

            .slide-text {
                position: absolute;
                bottom: 20%;
                left: 15%;
                z-index: 20;
                width: 35%;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row sticky-top bg-white shadow-sm">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a href="{{ config('app.url') }}">{{ Html::image('img/9Cloud_Marketplace_Logo.png', 'Logo', ['height' => '50']) }}</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Main Menu">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="mainMenu">
                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0 font-weight-bold">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-dark" href="navbarDropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        CATEGORIES
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                        <a class="dropdown-item" href="#">{{ Html::image('https://storage.googleapis.com/9cloud/productivity_icon.png', '', ['height' => '30']) }} Productivity</a>
                                        <a class="dropdown-item" href="#">{{ Html::image('https://storage.googleapis.com/9cloud/accounting_menu_icon.png', '', ['height' => '30']) }} Cybersecurity</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-dark" href="navbarDropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        SERVICES
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                        <a class="dropdown-item" href="#">Software as a Service (SaaS)</a>
                                        <a class="dropdown-item" href="#">Infrastructure as a Service (IaaS) <span class="badge badge-secondary">Coming Soon</span></a>
                                        <a class="dropdown-item" href="#">Platform as a Service (IaaS) <span class="badge badge-secondary">Coming Soon</span></a>
                                        <a class="dropdown-item" href="#">Managed Services <span class="badge badge-secondary">Coming Soon</span></a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">ENQUIRY</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#"><i class="fa fa-shopping-cart"><sup class="badge badge-danger">5</sup></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#"><i class="fa fa-search"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">LOG IN</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">CREATE ACCOUNT</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            @yield('content')
            <div class="row" style="margin-top: 50px;">
                <div class="col-12" style="height: 2px; background-color: {{ env('BRAND_COLOUR_2') }}; margin-bottom: 40px;">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="row">
                        <div class="col-lg-3" style="margin-bottom: 30px;">
                            <h5 class="font-weight-bold">Productivity</h5>
                            <a href="#">Product 1</a><br />
                            <a href="#">Product 2</a><br />
                            <a href="#">Product 3</a><br />
                        </div>
                        <div class="col-lg-3" style="margin-bottom: 30px;">
                            <h5 class="font-weight-bold">Digital Transformation</h5>
                            <a href="#">Product 1</a><br />
                            <a href="#">Product 2</a><br />
                            <a href="#">Product 3</a><br />
                        </div>
                        <div class="col-lg-3" style="margin-bottom: 30px;">
                            <h5 class="font-weight-bold">Cybersecurity</h5>
                            <a href="#">Product 1</a><br />
                            <a href="#">Product 2</a><br />
                            <a href="#">Product 3</a><br />
                        </div>
                        <div class="col-lg-3" style="margin-bottom: 30px; border-left: 1px solid {{ env('BRAND_COLOUR_1') }};">
                            <h5 class="font-weight-bold">Get in touch</h5>
                            08090000200<br />
                            care@9mobile.com.ng<br />
                            <a href="#"><i class="fab fa-facebook-f"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#"><i class="fab fa-twitter"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#"><i class="fab fa-instagram"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <br />
                            <a class="btn rounded-pill" href="#" style="background-color: {{ env('BRAND_COLOUR_1') }}; color: #FFF;"><i class="fa fa-envelope"></i> Contact Us</a>
                            <br /><br />
                            <a href="#">Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="height: 2px; background-color: {{ env('BRAND_COLOUR_2') }}; margin-top: 40px;">
                </div>
            </div>
            <div class="row" style="margin: 20px 0;">
                <div class="offset-lg-1 col-lg-10">
                    &copy; {{ date("Y") }} 9Mobile. All Rights Reserved | Powered by: <a target="_blank" href="https://icit.ng">{{ Html::image('img/ICIT_new_logo.svg', 'ICIT Logo', ['height' => '15em']) }}</a>
                </div>
            </div>
        </div>
    </body>
</html>
