@extends('admin.app', ['page_title' => 'Categories', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('administrators.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>New Category</legend>
        {!! Form::model(new App\DCategory, ['route' => ['categories.store'], 'class' => 'form-group']) !!}
            @include('admin/categories/form', ['submit_text' => 'Create Category'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
