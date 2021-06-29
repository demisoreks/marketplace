@extends('admin.app', ['page_title' => 'Products', 'menu' => 'product'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('products.show', $product->slug()) }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>Edit Product Plan</legend>
        {!! Form::model($product_plan, ['route' => ['products.product_plans.update', [$product->slug(), $product_plan->slug()]], 'class' => 'form-group']) !!}
        @method('PUT')
        @include('admin/product_plans/form', ['submit_text' => 'Update Product Plan'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
