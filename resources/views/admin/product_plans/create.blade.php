@extends('admin.app', ['page_title' => 'Products', 'menu' => 'product'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('products.show', $product->slug()) }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>New Product Plan for {{ $product->name }}</legend>
        {!! Form::model(new App\DProductPlan, ['route' => ['products.product_plans.store', [$product->slug()]], 'class' => 'form-group']) !!}
            @include('admin/product_plans/form', ['submit_text' => 'Create Product Plan'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
