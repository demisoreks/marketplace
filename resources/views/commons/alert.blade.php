@if (Session::has('success'))
    <div class="alert alert-success text-left" role="alert">
        {!! Session::get('success') !!}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger text-left" role="alert">
        {!! Session::get('error') !!}
    </div>
@endif
