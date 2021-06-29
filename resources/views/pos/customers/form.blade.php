<div class="form-group row">
    {!! Form::label('company_name', 'Company Name *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('company_name', $value = null, ['class' => 'form-control', 'placeholder' => 'Company Name', 'required' => true, 'maxlength' => 100]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('phone', 'Phone *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::number('phone', $value = null, ['class' => 'form-control', 'placeholder' => 'Phone', 'required' => true, 'maxlength' => 20]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('email', 'Email Address *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'Email Address', 'required' => true, 'maxlength' => 50]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('address', 'Address *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('address', $value = null, ['class' => 'form-control', 'placeholder' => 'Address', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('city', 'City *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('city', $value = null, ['class' => 'form-control', 'placeholder' => 'City', 'required' => true, 'maxlength' => 100]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('state', 'State *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('state', $value = null, ['class' => 'form-control', 'placeholder' => 'State', 'required' => true, 'maxlength' => 100]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('website', 'Website *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('website', $value = null, ['class' => 'form-control', 'placeholder' => 'Website', 'required' => true]) !!}
    </div>
</div>
<legend>Primary Contact</legend>
<div class="form-group row">
    {!! Form::label('first_name', 'First Name *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('first_name', $value = null, ['class' => 'form-control', 'placeholder' => 'First Name', 'required' => true, 'maxlength' => 100]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('last_name', 'Last Name *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('last_name', $value = null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required' => true, 'maxlength' => 100]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('contact_phone', 'Contact Phone *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::number('contact_phone', $value = null, ['class' => 'form-control', 'placeholder' => 'Contact Phone', 'required' => true, 'maxlength' => 20]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('contact_email', 'Contact Email Address *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::email('contact_email', $value = null, ['class' => 'form-control', 'placeholder' => 'Contact Email Address', 'required' => true, 'maxlength' => 50]) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-10 offset-md-2">
        <button type="submit" class="btn btn-sm" style="color: #fff; background-color: #{{ $site->getConfiguration()->colour1 }};">{{ $submit_text }}</button>
    </div>
</div>
