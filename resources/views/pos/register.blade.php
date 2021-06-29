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
            $('#registration_form').submit(function () {
                var password = $('#password').val();
                var password2 = $('#password2').val();

                if (password != password2) {
                    alert("Passwords do not match");
                    $('#password').focus();
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
                <div class="col-md-6">
                    <div class="bg-white" style="min-height: 450px; border-radius: 7px; padding: 50px;">
                        <h3 class="font-weight-bold">Welcome to {{ $site->getConfiguration()->name }} POS</h3>
                        <p>Kindly complete the form below to start selling.</p>
                        @include('commons.alert')
                        {!! Form::model(null, ['route' => ['pos_create_account'], 'class' => 'form-group', 'id' => 'registration_form']) !!}
                        <div class="form-group row">
                            {!! Form::label('company_name', 'Company Name *', ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('company_name', $value = null, ['class' => 'form-control', 'placeholder' => 'Company Name', 'required' => true, 'maxlength' => 100]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('phone', 'Phone *', ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::number('phone', $value = null, ['class' => 'form-control', 'placeholder' => 'Phone', 'required' => true, 'maxlength' => 20]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('email', 'Email Address *', ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'Email Address', 'required' => true, 'maxlength' => 50]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('password', 'Password *', ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => true, 'maxlength' => 20, 'id' => 'password']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('password2', 'Confirm Password *', ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::password('password2', ['class' => 'form-control', 'placeholder' => 'Confirm Password', 'required' => true, 'maxlength' => 20, 'id' => 'password2']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('address', 'Address *', ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('address', $value = null, ['class' => 'form-control', 'placeholder' => 'Address', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('city', 'City *', ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('city', $value = null, ['class' => 'form-control', 'placeholder' => 'City', 'required' => true, 'maxlength' => 100]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('state', 'State *', ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('state', $value = null, ['class' => 'form-control', 'placeholder' => 'State', 'required' => true, 'maxlength' => 100]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('website', 'Website *', ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('website', $value = null, ['class' => 'form-control', 'placeholder' => 'Website', 'required' => true]) !!}
                            </div>
                        </div>
                        <legend>Primary Contact</legend>
                        <div class="form-group row">
                            {!! Form::label('first_name', 'First Name *', ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('first_name', $value = null, ['class' => 'form-control', 'placeholder' => 'First Name', 'required' => true, 'maxlength' => 100]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('last_name', 'Last Name *', ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('last_name', $value = null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required' => true, 'maxlength' => 100]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('contact_phone', 'Contact Phone *', ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::number('contact_phone', $value = null, ['class' => 'form-control', 'placeholder' => 'Contact Phone', 'required' => true, 'maxlength' => 20]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('contact_email', 'Contact Email Address *', ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::email('contact_email', $value = null, ['class' => 'form-control', 'placeholder' => 'Contact Email Address', 'required' => true, 'maxlength' => 50]) !!}
                            </div>
                        </div>
                        <legend style="margin-bottom: 0;">Partnership(s)</legend>
                        <span class="text-danger">Supply your partner ID(s)<br /><br /></span>
                        @foreach($product_providers as $product_provider)
                        <div class="form-group row">
                            {!! Form::label($product_provider->id, $product_provider->name, ['class' => 'col-md-4 col-form-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text($product_provider->id, $value = null, ['class' => 'form-control', 'placeholder' => $product_provider->name.' Partner ID']) !!}
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-lg btn-secondary">Start Selling</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
