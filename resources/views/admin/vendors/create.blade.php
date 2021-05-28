@extends('admin.app', ['page_title' => 'Vendors', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('vendors.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>New Vendor</legend>
        {!! Form::model(new App\DVendor, ['route' => ['vendors.store'], 'class' => 'form-group']) !!}
            @include('admin/vendors/form', ['submit_text' => 'Create Vendor'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
