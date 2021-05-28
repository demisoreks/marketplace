@extends('admin.app', ['page_title' => 'Billing Intervals', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('billing_intervals.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>Edit Billing Interval</legend>
        {!! Form::model($billing_interval, ['route' => ['billing_intervals.update', $billing_interval->slug()], 'class' => 'form-group']) !!}
        @method('PUT')
        @include('admin/billing_intervals/form', ['submit_text' => 'Update Billing Interval'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
