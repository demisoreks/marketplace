@extends('pos.app', ['page_title' => 'Customers', 'menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('pos.customers.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>Edit Customer</legend>
        {!! Form::model($customer, ['route' => ['pos.customers.update', $vendor->id], 'class' => 'form-group']) !!}
        @method('PUT')
        @include('pos/customers/form', ['submit_text' => 'Update Customer'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
