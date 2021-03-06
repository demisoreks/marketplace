<div class="form-group row">
    {!! Form::label('months', 'Number of Months', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::number('months', $value = null, ['class' => 'form-control', 'placeholder' => 'Number of Months', 'min' => 1, 'max' => 12]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('name', 'Name *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => true, 'maxlength' => 100]) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-10 offset-md-2">
        <button type="submit" class="btn btn-sm" style="color: #fff; background-color: #{{ $site->getConfiguration()->colour1 }};">{{ $submit_text }}</button>
    </div>
</div>
