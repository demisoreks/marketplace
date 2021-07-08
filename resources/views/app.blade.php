<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $site->getConfiguration()->name }} @if(isset($page_title)) {{ " | ".$page_title }} @endif</title>

        <!-- Fonts -->
        {!! Html::style("https://fonts.googleapis.com/css?family=Maven+Pro") !!}

        <!-- Scripts -->
        {!! Html::script('js/jquery-3.3.1.min.js') !!}
        {!! Html::script('js/popper.min.js') !!}
        {!! Html::script('js/app.js') !!}
        {!! Html::script('js/mdb.min.js') !!}
        {!! Html::script('js/datatables.min.js') !!}
        {!! Html::script('js/dataTables.responsive.min.js') !!}
        {!! Html::script('js/dataTables.buttons.min.js') !!}
        {!! Html::script('js/select2.min.js') !!}

        <!-- Styles -->
        {!! Html::style('css/app.css') !!}
        {!! Html::style('fontawesome/css/all.css') !!}
        {!! Html::style('css/mdb.min.css') !!}
        {!! Html::style('css/datatables.min.css') !!}
        {!! Html::style('css/responsive.dataTables.min.css') !!}
        {!! Html::style('css/buttons.dataTables.min.css') !!}
        {!! Html::style('css/select2.min.css') !!}

        <style>
            html, body {
                background-color: #fff;
                font-family: 'Maven Pro', sans-serif;
            }

            a {
                color: #{{ $site->getConfiguration()->colour1 }};
            }

            a:hover {
                color: #{{ $site->getConfiguration()->colour2 }};
            }

            .page-item.active .page-link {
                color: #fff !important;
                background-color: #{{ $site->getConfiguration()->colour1 }} !important;
            }

            .page-link {
                color: #{{ $site->getConfiguration()->colour1 }} !important;
                background-color: #fff !important;
            }

            .page-link:hover {
                color: #fff !important;
                background-color: #{{ $site->getConfiguration()->colour1 }} !important;
            }

            .slide-text {
                position: absolute;
                bottom: 20%;
                left: 15%;
                z-index: 20;
                width: 35%;
                color: white;
            }

            #loader-holder {
                width: 100%;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                position: absolute;
                background-color: #fff;
                z-index: 9999;
            }

            #loader {
                border: 16px solid #{{ $site->getConfiguration()->colour2 }};
                border-radius: 50%;
                border-top: 16px solid #{{ $site->getConfiguration()->colour1 }};
                border-bottom: 16px solid #{{ $site->getConfiguration()->colour1 }};
                width: 120px;
                height: 120px;
                -webkit-animation: spin 2s linear infinite;
                animation: spin 2s linear infinite;
                margin: auto;
            }

            @-webkit-keyframes spin {
                0% { -webkit-transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#loader-holder").css('display', 'none');
            });
        </script>
    </head>

    <body>
        <div id="loader-holder">
            <div id="loader"></div>
        </div>
        <div class="container-fluid">
            <div class="row sticky-top bg-white shadow-sm">
                <div class="col-12 no-gutters">
                    <nav class="navbar navbar-expand-lg navbar-light" style="box-shadow: none !important;">
                        <a href="{{ route('index') }}">{{ Html::image($site->getConfiguration()->logo_url, 'Logo', ['height' => '50']) }}</a>
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
                                        @foreach($site->getCategoriesByActive(true) as $category)
                                        <a class="dropdown-item" href="{{ route('category', $category->slug()) }}">{{ Html::image($category->logo_url, '', ['height' => '30']) }} {{ $category->name }}</a>
                                        @endforeach
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('enquiry') }}">ENQUIRY</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#"><i class="fa fa-shopping-cart"><sup class="badge badge-danger">@if (Cookie::has('cart')) {{ count(Cookie::get('cart')) }} @else 0 @endif</sup></i></a>
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
            <div class="row" style="background-color: #{{ $site->getConfiguration()->colour1 }};">
                <div class="col-lg-10 offset-lg-1 text-white" style="padding: 100px 30px;">
                    <div class="row">
                        <div class="col-lg-5">
                            <h2>Receive exclusive deals<br />to your inbox</h2>
                            <div class="input-group mb-3">
                                {!! Form::email('subscription_email', $value = null, ['class' => 'form-control form-control-lg', 'required' => true, 'placeholder' => 'Your email address', 'style' => 'background-color: transparent; border: 1px solid #fff; color: #fff; border-radius: 0;']) !!}
                                <div class="input-group-append">
                                    <div class="input-group-text" style="background-color: transparent; border: 1px solid #fff; color: #fff; border-radius: 0;">
                                        <a href="#"><i class="fa fa-arrow-right text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3>
                                    <a href="#"><i class="fab fa-facebook-f text-white"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="#"><i class="fab fa-twitter text-white"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="#"><i class="fab fa-instagram text-white"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                </h3>
                            </div>
                            <div class="text-white">
                                {{ $site->getConfiguration()->phone1 }}@if ($site->getConfiguration()->phone2 != null && $site->getConfiguration()->phone2 != ""){{ ', '.$site->getConfiguration()->phone2 }} @endif<br />
                                {{ $site->getConfiguration()->email }}<br />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row no-gutters">
                                <div class="col-12 font-weight-bold" style="border-bottom: 1px solid #fff; margin-bottom: 10px;">
                                    CATEGORIES
                                </div>
                                @foreach($site->getCategoriesByActive(true) as $category)
                                <div class="col-sm-6">
                                    <a class="text-white" href="{{ route('category', $category->slug()) }}">{{ $category->name }}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="row no-gutters">
                                <div class="col-12 font-weight-bold" style="border-bottom: 1px solid #fff; margin-bottom: 10px;">
                                    QUICK LINKS
                                </div>
                                <div class="col-12">
                                    <a class="text-white" href="#">Privacy Policy</a>
                                </div>
                                <div class="col-12">
                                    <a class="text-white" href="#">Contact Us</a>
                                </div>
                                <div class="col-12">
                                    <a class="text-white" href="{{ route('pos_index') }}">Become a Reseller</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters" style="margin: 20px 0;">
                        <div class="col-12">
                            &copy; {{ date("Y") }} {{ $site->getConfiguration()->name }}. All Rights Reserved | Powered by <a class="text-white font-weight-bold" target="_blank" href="https://icit.ng">ICIT Solutions Nigeria</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
