@extends('pos.app', ['page_title' => 'Sales', 'menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('pos.sales.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>New Sale</legend>
        {!! Form::model(null, ['route' => ['pos.sales.store'], 'class' => 'form-group']) !!}
            @include('pos/sales/form', ['submit_text' => 'Proceed'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
