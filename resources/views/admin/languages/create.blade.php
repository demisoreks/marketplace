@extends('admin.app', ['page_title' => 'Languages', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('languages.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>New Language</legend>
        {!! Form::model(new App\DLanguage, ['route' => ['languages.store'], 'class' => 'form-group']) !!}
            @include('admin/languages/form', ['submit_text' => 'Create Language'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
