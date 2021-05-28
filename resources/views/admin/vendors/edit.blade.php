@extends('admin.app', ['page_title' => 'Vendors', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-grey btn-sm" href="{{ route('vendors.index') }}"><i class="fas fa-times"></i> Cancel</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <legend>Edit Vendor</legend>
        {!! Form::model($vendor, ['route' => ['vendors.update', $vendor->slug()], 'class' => 'form-group']) !!}
        @method('PUT')
        @include('admin/vendors/form', ['submit_text' => 'Update Vendor'])
        {!! Form::close() !!}
    </div>
</div>
@endsection
