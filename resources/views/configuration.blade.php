<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>

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
        </style>

        <script type="text/javascript">
        $(document).ready(function () {
            $('#configuration_form').submit(function () {
                var password = $('#login_password').val();
                var password2 = $('#login_password2').val();

                if (password != password2) {
                    alert("Passwords do not match");
                    $('#login_password').focus();
                    return false;
                }

                return true;
            });
        });
        </script>
    </head>
    <body class="bg-dark">
        <div class="container-fluid" style="min-height: 100vh;">
            <div class="row" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 50px 0;">
                <div class="col-md-10">
                    <div class="bg-white" style="min-height: 450px; border-radius: 7px; padding: 50px;">
                        <h3 class="font-weight-bold">Welcome to iCommerce</h3>
                        <p>Kindly complete the form below to setup your marketplace.</p>
                        {!! Form::model(new App\DConfiguration, ['route' => ['configuration.store'], 'class' => 'form-group', 'id' => 'configuration_form']) !!}
                        @include('admin/configuration/form', ['submit_text' => 'Proceed'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
