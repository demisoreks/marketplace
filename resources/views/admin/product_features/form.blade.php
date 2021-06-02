<div class="form-group row">
    {!! Form::label('feature', 'Feature *', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::text('feature', $value = null, ['class' => 'form-control', 'placeholder' => 'Feature', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('highlight', 'Hightlight *', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::select('highlight', [0 => 'No', 1 => 'Yes'], $value = null, ['class' => 'form-control', 'placeholder' => '- Select Option -', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-sm" style="color: #fff; background-color: #{{ json_decode(Cookie::get('configuration'))->colour1 }};">{{ $submit_text }}</button>
    </div>
</div>
