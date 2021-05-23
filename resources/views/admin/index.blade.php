<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }} Admin @if(isset($page_title)) {{ " | ".$page_title }} @endif</title>

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
        </style>
    </head>
    <body class="bg-dark">
        <div class="container-fluid" style="height: 100vh;">
            <div class="row text-center" style="height: 100vh; display: flex; align-items: center; justify-content: center;">
                <div class="col-lg-4">
                    <div class="bg-white" style="min-height: 450px; border-radius: 7px; padding: 50px;">
                        <h3 class="font-weight-bold" style="color: {{ env('BRAND_COLOUR_1') }};">{{ config('app.name') }} Admin</h3>
                        <h5 class="font-weight-bold" style="margin-bottom: 30px; color: {{ env('BRAND_COLOUR_2') }};">Log in here</h5>
                        @include('commons.alert')
                        {!! Form::open(['route' => ['admin_authenticate'], 'class' => 'form-group', 'method' => 'post']) !!}
                        <div class="form-group" style="margin-bottom: 30px;">
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address', 'required' => true]) !!}
                        </div>
                        <div class="form-group" style="margin-bottom: 30px;">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => true]) !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block" style="color: #fff; background-color: {{ env('BRAND_COLOUR_1') }};">Log In</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
