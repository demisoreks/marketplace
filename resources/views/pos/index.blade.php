<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $site->getConfiguration()->name }} POS @if(isset($page_title)) {{ " | ".$page_title }} @endif</title>

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
                color: #{{ $site->getConfiguration()->colour1 }};
            }

            a:hover {
                color: #{{ $site->getConfiguration()->colour2 }};
            }

            #loader {
                border: 8px solid #{{ $site->getConfiguration()->colour2 }};
                border-radius: 50%;
                border-top: 8px solid #{{ $site->getConfiguration()->colour1 }};
                border-bottom: 8px solid #{{ $site->getConfiguration()->colour1 }};
                width: 40px;
                height: 40px;
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
            $('#login').submit(function () {
                alert("here");
                $('#submit-div').hide();
                $('#loader').show();
            });
        </script>
    </head>
    <body class="bg-dark">
        <div class="container-fluid" style="height: 100vh;">
            <div class="row text-center" style="height: 100vh; display: flex; align-items: center; justify-content: center;">
                <div class="col-lg-4">
                    <div class="bg-white" style="min-height: 450px; border-radius: 7px; padding: 50px;">
                        <h3 class="font-weight-bold" style="color: #{{ $site->getConfiguration()->colour1 }};">{{ $site->getConfiguration()->name }} POS</h3>
                        <h5 class="font-weight-bold" style="margin-bottom: 30px; color: #{{ $site->getConfiguration()->colour2 }};">Log in here</h5>
                        @include('commons.alert')
                        {!! Form::open(['route' => ['pos_authenticate'], 'class' => 'form-group', 'method' => 'post', 'id' => 'login-form']) !!}
                        <div class="form-group" style="margin-bottom: 30px;">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 30px;">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group" id="submit-div">
                            <button type="submit" class="btn btn-block" style="color: #fff; background-color: #{{ $site->getConfiguration()->colour1 }};">Log In</button>
                        </div>
                        <div id="loader" hidden></div>
                        {!! Form::close() !!}
                        <div class="text-center">
                            <a class="btn btn-dark btn-block" href="{{ route('pos_register') }}">I am a new reseller</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
