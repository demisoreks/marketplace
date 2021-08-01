@extends('app', ['page_title' => 'Create Account'])

@section('content')
<div class="row" style="margin: 50px 0;">
    <div class="col-lg-10 offset-lg-1">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div style="margin-bottom: 20px;">
                   <h1 class="font-weight-bold" style="color: #{{ $site->getConfiguration()->colour1 }}; display: inline;">Create Account</h1>
                </div>
                <div style="margin-bottom: 20px;">
                    @include('commons.alert')
                    {!! Form::model(null, ['route' => ['customer.store', ['do' => $do]], 'class' => 'form-group', 'id' => 'registration_form']) !!}
                    <div class="form-group row">
                        <div class="col-md-12">
                            {!! Form::text('company_name', $value = null, ['class' => 'form-control', 'placeholder' => 'Company Name', 'required' => true, 'maxlength' => 100]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'Email Address', 'required' => true, 'maxlength' => 50]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::number('phone', $value = null, ['class' => 'form-control', 'placeholder' => 'Phone', 'required' => true, 'maxlength' => 20]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => true, 'id' => 'password']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::password('password2', ['class' => 'form-control', 'placeholder' => 'Confirm Password', 'id' => 'password2']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            {!! Form::text('address', $value = null, ['class' => 'form-control', 'placeholder' => 'Address', 'required' => true]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            {!! Form::text('city', $value = null, ['class' => 'form-control', 'placeholder' => 'City', 'required' => true, 'maxlength' => 100]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('state', $value = null, ['class' => 'form-control', 'placeholder' => 'State', 'required' => true, 'maxlength' => 100]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            {!! Form::text('first_name', $value = null, ['class' => 'form-control', 'placeholder' => 'First Name', 'required' => true, 'maxlength' => 100]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('last_name', $value = null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required' => true, 'maxlength' => 100]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-block" style="background-color: transparent; border: 1px solid #{{ $site->getConfiguration()->colour1 }}; color: #{{ $site->getConfiguration()->colour1 }}; border-radius: 0;">Create Account</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    Have an account? <a href="{{ route('login', ['do' => $do]) }}">Log In</a>
                </div>
            </div>
        </div>
    </div>
</div>

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
@endsection
