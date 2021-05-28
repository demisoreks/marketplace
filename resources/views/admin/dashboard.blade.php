@extends('admin.app', ['page_title' => 'Dashboard', 'menu' => 'product'])

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-body text-center">
                <a href="#">
                    <h1><i class="fa fa-layer-group"></i></h1>
                    <h4><p>Products</p></h4>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-body text-center">
                <a href="{{ route('vendors.index') }}">
                    <h1><i class="fa fa-industry"></i></h1>
                    <h4><p>Vendors</p></h4>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-body text-center">
                <a href="{{ route('categories.index') }}">
                    <h1><i class="fa fa-tag"></i></h1>
                    <h4><p>Categories</p></h4>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-body text-center">
                <a href="{{ route('versions.index') }}">
                    <h1><i class="fa fa-server"></i></h1>
                    <h4><p>Versions</p></h4>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-body text-center">
                <a href="{{ route('billing_intervals.index') }}">
                    <h1><i class="fa fa-clock"></i></h1>
                    <h4><p>Billing Intervals</p></h4>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-body text-center">
                <a href="{{ route('languages.index') }}">
                    <h1><i class="fa fa-language"></i></h1>
                    <h4><p>Languages</p></h4>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-body text-center">
                <a href="{{ route('administrators.index') }}">
                    <h1><i class="fa fa-user"></i></h1>
                    <h4><p>Administrators</p></h4>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-body text-center">
                <a href="{{ route('configuration.edit') }}">
                    <h1><i class="fa fa-cog"></i></h1>
                    <h4><p>Configuration</p></h4>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
