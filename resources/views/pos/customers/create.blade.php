@extends('pos.app', ['page_title' => 'Customers', 'menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('pos.customers.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>New Customer</legend>
        {!! Form::model(null, ['route' => ['pos.customers.store'], 'class' => 'form-group']) !!}
            @include('pos/customers/form', ['submit_text' => 'Create Customer'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
