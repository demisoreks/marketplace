<div class="form-group row">
    {!! Form::label('question', 'Question *', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('question', $value = null, ['class' => 'form-control', 'placeholder' => 'Question', 'required' => true, 'rows' => 3]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('answer', 'Answer *', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('answer', $value = null, ['class' => 'form-control', 'placeholder' => 'Answer', 'required' => true, 'rows' => 3]) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-sm" style="color: #fff; background-color: #{{ $site->getConfiguration()->colour1 }};">{{ $submit_text }}</button>
    </div>
</div>
