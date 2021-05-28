@extends('admin.app', ['page_title' => 'Languages', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('languages.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>Edit Language</legend>
        {!! Form::model($language, ['route' => ['languages.update', $language->slug()], 'class' => 'form-group']) !!}
        @method('PUT')
        @include('admin/languages/form', ['submit_text' => 'Update Language'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
