@extends('app', ['page_title' => $page_title])

@section('content')
<div class="row" style="margin: 50px 0;">
    <div class="col-lg-10 offset-lg-1">
        @include('commons.alert')
        <div class="row">
            <div class="col-md-3">
                <nav class="nav flex-column" style="background-color: #efefef;">
                    <a class="nav-link @if ($active_link == 'profile') active @endif" href="{{ route('customer.profile') }}">Profile</a>
                    <a class="nav-link @if ($active_link == 'orders') active @endif" href="#">Orders</a>
                    <a class="nav-link @if ($active_link == 'support') active @endif" href="#">Support</a>
                    <a class="nav-link @if ($active_link == 'change_password') active @endif" href="#">Change Password</a>
                    <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
                </nav>
            </div>
            <div class="col-md-9">
                <legend style="color: #{{ $site->getConfiguration()->colour1 }};">{{ $page_title }}</legend>
                @yield('content_customer')
            </div>
        </div>
    </div>
</div>
@endsection
