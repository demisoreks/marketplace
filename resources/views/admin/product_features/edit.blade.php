@extends('admin.app', ['page_title' => 'Products', 'menu' => 'product'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('products.show', $product->slug()) }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <legend>Edit Product Feature for {{ $product->name }}</legend>
        {!! Form::model($product_feature, ['route' => ['products.product_features.update', [$product->slug(), $product_feature->slug()]], 'class' => 'form-group']) !!}
        @method('PUT')
        @include('admin/product_features/form', ['submit_text' => 'Update Product Feature'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
