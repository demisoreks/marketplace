<div class="form-group row">
    {!! Form::label('name', 'Name *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => true, 'maxlength' => 100]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('version_id', 'Version *', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::select('version_id', $versions, $value = null, ['class' => 'form-control', 'placeholder' => '- Select Option -', 'required' => true]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('features', 'Features', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        @foreach ($product_features as $product_feature)
        @php
        $checked = false;
        if (isset($features) && in_array($product_feature->id, $features)) {
            $checked = true;
        }
        @endphp
        <div class="form-check">
            {!! Form::checkbox('product_feature'.$product_feature->id, $value = null, $checked, ['class' => 'form-check-input']) !!}
            {!! Form::label('product_feature'.$product_feature->id, $product_feature->feature, ['class' => 'form-check-label']) !!}
        </div>
        @endforeach
    </div>
</div>
<legend style="margin-bottom: 0;">Plan Codes</legend>
<span class="text-danger">Leave empty if there is no plan for the billing interval.<br /><br /></span>
@foreach($billing_intervals as $billing_interval)
@php
    $code = null;
    if (isset($product_plan)) {
        $product_plan_codes = App\DProductPlanCode::where('product_plan_id', $product_plan->id)->where('billing_interval_id', $billing_interval->id);
        if ($product_plan_codes->count() > 0) {
            $code = $product_plan_codes->first()->code;
        }
    }
@endphp
<div class="form-group row">
    {!! Form::label('billing_interval'.$billing_interval->id, $billing_interval->name, ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-4">
        {!! Form::text('billing_interval'.$billing_interval->id, $value = $code, ['class' => 'form-control', 'placeholder' => $billing_interval->name.' Plan Code']) !!}
    </div>
</div>
@endforeach
<div class="form-group row">
    <div class="col-md-10 offset-md-2">
        <button type="submit" class="btn btn-sm" style="color: #fff; background-color: #{{ $site->getConfiguration()->colour1 }};">{{ $submit_text }}</button>
    </div>
</div>
