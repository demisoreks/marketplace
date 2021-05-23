@extends('admin.app', ['page_title' => 'Administrators', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('administrators.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>New Administrator</legend>
        {!! Form::model(new App\DAdministrator, ['route' => ['administrators.store'], 'class' => 'form-group']) !!}
            @include('admin/administrators/form', ['submit_text' => 'Create Administrator'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
