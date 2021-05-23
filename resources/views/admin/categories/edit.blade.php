@extends('admin.app', ['page_title' => 'Categories', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('categories.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>Edit Category</legend>
        {!! Form::model($category, ['route' => ['categories.update', $category->slug()], 'class' => 'form-group']) !!}
        @method('PUT')
        @include('admin/categories/form', ['submit_text' => 'Update Category'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
