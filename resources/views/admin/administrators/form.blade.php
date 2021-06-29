<div class="form-group row">
    {!! Form::label('name', 'Name *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => true, 'maxlength' => 100]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('email', 'Email Address *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'Email Address', 'required' => true, 'maxlength' => 100]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('password', 'Password', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        @if (isset($administrator))
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => false]) !!}
        <small class="text-danger">Leave empty if password is not changing</small>
        @else
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => true]) !!}
        @endif
    </div>
</div>
<div class="form-group row">
    {!! Form::label('super', 'Super Admin', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::select('super', [0 => 'No', 1 => 'Yes'], $value = null, ['class' => 'form-control', 'placeholder' => '- Select Option -', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-10 offset-md-2">
        <button type="submit" class="btn btn-sm" style="color: #fff; background-color: #{{ $site->getConfiguration()->colour1 }};">{{ $submit_text }}</button>
    </div>
</div>
