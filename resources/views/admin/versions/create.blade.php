@extends('admin.app', ['page_title' => 'Versions', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('versions.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>New Version</legend>
        {!! Form::model(new App\DVersion, ['route' => ['versions.store'], 'class' => 'form-group']) !!}
            @include('admin/versions/form', ['submit_text' => 'Create Version'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
