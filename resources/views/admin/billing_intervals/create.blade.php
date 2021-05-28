@extends('admin.app', ['page_title' => 'Billing Intervals', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('billing_intervals.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>New Billing Interval</legend>
        {!! Form::model(new App\DBillingInterval, ['route' => ['billing_intervals.store'], 'class' => 'form-group']) !!}
            @include('admin/billing_intervals/form', ['submit_text' => 'Create Billing Interval'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
