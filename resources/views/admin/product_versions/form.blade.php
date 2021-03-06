<div class="form-group row">
    {!! Form::label('version_id', 'Version *', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::select('version_id', App\DVersion::where('active', true)->orderBy('name')->pluck('name', 'id'), $value = null, ['class' => 'form-control', 'placeholder' => '- Select Option -', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-sm" style="color: #fff; background-color: #{{ $site->getConfiguration()->colour1 }};">{{ $submit_text }}</button>
    </div>
</div>
