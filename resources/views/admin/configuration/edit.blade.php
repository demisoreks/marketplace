@extends('admin.app', ['page_title' => 'Configuration', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12">
        <legend>Edit Configuration</legend>
        {!! Form::model(App\Core\Services\Configuration::get(), ['route' => ['configuration.update'], 'class' => 'form-group']) !!}
        @method('PUT')
        @include('admin/configuration/form', ['submit_text' => 'Update Configuration'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
