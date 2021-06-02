@extends('admin.app', ['page_title' => 'Products', 'menu' => 'product'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('products.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>Edit Product</legend>
        {!! Form::model($product, ['route' => ['products.update', $product->slug()], 'class' => 'form-group']) !!}
        @method('PUT')
        @include('admin/products/form', ['submit_text' => 'Update Product'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
