<div class="form-group row">
    {!! Form::label('name', 'Name *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => true, 'maxlength' => 100]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('featured', 'Featured *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::select('featured', [0 => 'No', 1 => 'Yes'], $value = null, ['class' => 'form-control', 'placeholder' => '- Select Option -', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('vendor_id', 'Vendor *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::select('vendor_id', App\DVendor::where('active', true)->orderBy('name')->pluck('name', 'id'), $value = null, ['class' => 'form-control', 'placeholder' => '- Select Option -', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('logo_url', 'Logo URL', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('logo_url', $value = null, ['class' => 'form-control', 'placeholder' => 'Logo URL']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('image_url', 'Image URL', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('image_url', $value = null, ['class' => 'form-control', 'placeholder' => 'Image URL']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('summary', 'Summary', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::textarea('summary', $value = null, ['class' => 'form-control', 'placeholder' => 'Brief Summary', 'rows' => 3]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('details', 'Details', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('details', $value = null, ['class' => 'form-control', 'placeholder' => 'Details', 'rows' => 10, 'id' => 'details']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-10 offset-md-2">
        <button type="submit" class="btn btn-sm" style="color: #fff; background-color: #{{ $site->getConfiguration()->colour1 }};">{{ $submit_text }}</button>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('details');
</script>
