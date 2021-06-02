<div class="form-group row">
    {!! Form::label('name', 'Name *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => true, 'maxlength' => 100]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('contact_address', 'Contact Address', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::textarea('contact_address', $value = null, ['class' => 'form-control', 'placeholder' => 'Contact Address', 'rows' => 3]) !!}
    </div>
</div>
<legend style="margin-bottom: 0;">Contact Details</legend>
<span class="text-danger">For support purposes<br /><br /></span>
<div class="form-group row">
    {!! Form::label('phone1', 'Primary Phone *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::number('phone1', $value = null, ['class' => 'form-control', 'placeholder' => 'Primary Phone', 'required' => true, 'maxlength' => 20]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('phone2', 'Alternate Phone', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::number('phone2', $value = null, ['class' => 'form-control', 'placeholder' => 'Alternate Phone', 'maxlength' => 20]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('email', 'Email Address *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'Email Address', 'required' => true, 'maxlength' => 50]) !!}
    </div>
</div>
<legend style="margin-bottom: 0;">Branding</legend>
<div class="form-group row">
    {!! Form::label('colour1', 'Primary Colour *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">#</span>
            </div>
            {!! Form::text('colour1', $value = null, ['class' => 'form-control', 'placeholder' => 'Primary Colour', 'required' => true, 'maxlength' => 6]) !!}
        </div>
        <small class="text-danger">Only hex values allowed (without the #), e.g., 000000 for black</small>
    </div>
</div>
<div class="form-group row">
    {!! Form::label('colour2', 'Secondary Colour *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">#</span>
            </div>
            {!! Form::text('colour2', $value = null, ['class' => 'form-control', 'placeholder' => 'Secondary Colour', 'required' => true, 'maxlength' => 6]) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    {!! Form::label('logo_url', 'Logo URL *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('logo_url', $value = null, ['class' => 'form-control', 'placeholder' => 'Logo URL', 'required' => true]) !!}
    </div>
</div>
@if (App\Core\Services\Configuration::get() == null)
<legend style="margin-bottom: 0;">Administrator Details</legend>
<span class="text-danger">These details will be used to create the first administrator account<br /><br /></span>
<div class="form-group row">
    {!! Form::label('login_email', 'Login Email *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::email('login_email', $value = null, ['class' => 'form-control', 'placeholder' => 'Login Email', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('login_password', 'Login Password *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::password('login_password', ['class' => 'form-control', 'placeholder' => 'Login Password', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('login_password2', 'Confirm Password *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::password('login_password2', ['class' => 'form-control', 'placeholder' => 'Confirm Password', 'required' => true]) !!}
    </div>
</div>
@endif
<div class="form-group row">
    <div class="col-md-10 offset-md-2">
        @if (App\Core\Services\Configuration::get() == null)
        <button type="submit" class="btn btn-sm btn-secondary">{{ $submit_text }}</button>
        @else
        <button type="submit" class="btn btn-sm" style="color: #fff; background-color: #{{ json_decode(Cookie::get('configuration'))->colour1 }};">{{ $submit_text }}</button>
        @endif
    </div>
</div>
