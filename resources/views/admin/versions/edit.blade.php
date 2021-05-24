@extends('admin.app', ['page_title' => 'Versions', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('versions.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>Edit Version</legend>
        {!! Form::model($version, ['route' => ['versions.update', $version->slug()], 'class' => 'form-group']) !!}
        @method('PUT')
        @include('admin/versions/form', ['submit_text' => 'Update Version'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
