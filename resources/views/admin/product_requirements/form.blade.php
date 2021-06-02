<div class="form-group row">
    {!! Form::label('requirement', 'Requirement *', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::text('requirement', $value = null, ['class' => 'form-control', 'placeholder' => 'Requirement', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-sm" style="color: #fff; background-color: #{{ json_decode(Cookie::get('configuration'))->colour1 }};">{{ $submit_text }}</button>
    </div>
</div>
