@extends('app', ['page_title' => 'Log In'])

@section('content')
<div class="row" style="margin: 50px 0;">
    <div class="col-lg-10 offset-lg-1">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 text-center">
                <div style="margin-bottom: 20px;">
                   <h1 class="font-weight-bold" style="color: #{{ $site->getConfiguration()->colour1 }}; display: inline;">Log In</h1>
                </div>
                <div style="margin-bottom: 20px;">
                    @include('commons.alert')
                    {!! Form::model(null, ['route' => ['authenticate', ['do' => $do]], 'class' => 'form-group']) !!}
                    <div class="form-group row">
                        <div class="col-md-12">
                            {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'Email Address', 'required' => true, 'maxlength' => 50]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => true, 'id' => 'password']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-block" style="background-color: transparent; border: 1px solid #{{ $site->getConfiguration()->colour1 }}; color: #{{ $site->getConfiguration()->colour1 }}; border-radius: 0;">Log In</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    Don't have an account? <a href="{{ route('register', ['do' => $do]) }}">Create Account</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
