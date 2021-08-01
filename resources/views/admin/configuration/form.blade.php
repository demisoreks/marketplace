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
@if (App\Core\Services\Configuration::get() != null)
<legend style="margin-bottom: 0;">Charges</legend>
<span class="text-danger">For VAT and other additional charges<br /><br /></span>
<div class="form-group row">
    {!! Form::label('vat_percent', 'VAT *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        <div class="input-group">
            {!! Form::number('vat_percent', $value = null, ['class' => 'form-control', 'placeholder' => 'Value Added Tax', 'required' => true, 'step' => 0.01]) !!}
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
        <small class="text-danger">Leave as '0' if VAT is already included in product price</small>
    </div>
</div>
<div class="form-group row">
    {!! Form::label('charge_type', 'Charge Type', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::select('charge_type', ['N' => 'No Charge', 'F' => 'Fixed Charge', 'P' => 'Percentage Charge'], $value = null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row fixed-charge" @if ($configuration->fixed_charge == 0) style="display: none;" @endif>
    {!! Form::label('fixed_charge', 'Fixed Charge *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::number('fixed_charge', $value = null, ['class' => 'form-control', 'placeholder' => 'Fixed Charge', 'step' => 0.01]) !!}
    </div>
</div>
<div class="form-group row percent-charge" @if ($configuration->percent_charge == 0) style="display: none;" @endif>
    {!! Form::label('percent_charge', 'Percentage Charge *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        <div class="input-group">
            {!! Form::number('percent_charge', $value = null, ['class' => 'form-control', 'placeholder' => 'Percentage Charge', 'step' => 0.01]) !!}
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
    </div>
</div>
<div class="form-group row percent-charge" @if ($configuration->percent_charge == 0) style="display: none;" @endif>
    {!! Form::label('max_charge', 'Maximum Charge *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::number('max_charge', $value = null, ['class' => 'form-control', 'placeholder' => 'Maximum Charge', 'step' => 0.01]) !!}
        <small class="text-danger">Leave as '0' if there is no cap</small>
    </div>
</div>
@endif
<div class="form-group row">
    <div class="col-md-10 offset-md-2">
        @if (App\Core\Services\Configuration::get() == null)
        <button type="submit" class="bn btn-sm btn-secondary">{{ $submit_text }}</button>
        @else
        <button type="submit" class="btn btn-sm" style="color: #fff; background-color: #{{ $site->getConfiguration()->colour1 }};">{{ $submit_text }}</button>
        @endif
    </div>
</div>

<script type="text/javascript">
    $('#charge_type').change(function () {
        var charge_type = $('#charge_type').val();
        if (charge_type == 'F') {
            $('.fixed-charge').slideDown(1000);
            $('.percent-charge').slideUp(100);
        } else if (charge_type == 'P') {
            $('.percent-charge').slideDown(1000);
            $('.fixed-charge').slideUp(100);
        } else {
            $('.fixed-charge').slideUp(1000);
            $('.percent-charge').slideUp(100);
        }
    });
</script>
