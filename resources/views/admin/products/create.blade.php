@extends('admin.app', ['page_title' => 'Products', 'menu' => 'product'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('products.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>New Product</legend>
        {!! Form::model(new App\DProduct, ['route' => ['products.store'], 'class' => 'form-group']) !!}
            @include('admin/products/form', ['submit_text' => 'Create Product'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
