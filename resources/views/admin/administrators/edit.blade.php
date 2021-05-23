@extends('admin.app', ['page_title' => 'Administrators', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('administrators.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>Edit Administrator</legend>
        {!! Form::model($administrator, ['route' => ['administrators.update', $administrator->slug()], 'class' => 'form-group']) !!}
        @method('PUT')
        @include('admin/administrators/form', ['submit_text' => 'Update Administrator'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
