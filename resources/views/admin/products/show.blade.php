@extends('admin.app', ['page_title' => 'Products', 'menu' => 'product'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-sm" href="{{ route('products.index') }}" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fas fa-arrow-left"></i> Back to List of Products</a>
        @if ($product->active)
        <a class="btn btn-sm btn-dark" href="{{ route('products.disable', [$product->slug()]) }}" onclick="return confirmDisable()"><i class="fa fa-times"></i> Disable</a>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-header font-weight-bold">
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-6">Basic Information</div>
                    <div class="col-6 text-right"><a class="btn btn-sm" href="{{ route('products.edit', [$product->slug()]) }}" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fas fa-edit"></i> Edit</a></div>
                </div>
            </div>
            <div class="card-body table-responsive-sm" style="height: 400px; overflow-y: scroll;">
                <table class="table table-hover" width="100%">
                    <tr>
                        <td class="font-weight-bold">Name</td>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Featured</td>
                        <td>@if ($product->featured) Yes @else No @endif</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Vendor</td>
                        <td>{{ $product->vendor->name }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Logo</td>
                        <td>@if ($product->logo_url) {{ Html::image($product->logo_url, 'Logo', ['height' => '50px']) }} @endif</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Image</td>
                        <td>@if ($product->image_url) {{ Html::image($product->image_url, 'Image', ['height' => '100px']) }} @endif</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Summary</td>
                        <td>{!! nl2br($product->summary) !!}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Details</td>
                        <td>{!! $product->details !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-header font-weight-bold">
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-6">Categories ({{ $product_categories->count() }})</div>
                    <div class="col-6 text-right"><a class="btn btn-sm" data-toggle="modal" data-target="#modal1" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fas fa-plus"></i> Add</a></div>
                </div>
            </div>
            <div class="card-body" style="height: 156px; overflow-y: scroll;">
                @if ($product_categories->count() == 0)
                No records.
                @else
                <table class="table table-hover" width="100%">
                    @foreach ($product_categories as $product_category)
                    <tr>
                        <td>{{ $product_category->category->name }}</td>
                        <td width="10%">
                            <form method="POST" action="{{ route('products.product_categories.destroy', [$product->slug(), $product_category->slug()]) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-link" style="padding: 0;" type="submit" title="Delete" onclick="return confirmDelete()"><i class="fas fa-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-header font-weight-bold">
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-6">Requirements ({{ $product_requirements->count() }})</div>
                    <div class="col-6 text-right"><a class="btn btn-sm" data-toggle="modal" data-target="#modal2" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fas fa-plus"></i> Add</a></div>
                </div>
            </div>
            <div class="card-body" style="height: 156px; overflow-y: scroll;">
                @if ($product_requirements->count() == 0)
                No records.
                @else
                <table class="table table-hover" width="100%">
                    @foreach ($product_requirements as $product_requirement)
                    <tr>
                        <td>{{ $product_requirement->requirement }}</td>
                        <td width="10%">
                            <form method="POST" action="{{ route('products.product_requirements.destroy', [$product->slug(), $product_requirement->slug()]) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-link" style="padding: 0;" type="submit" title="Delete" onclick="return confirmDelete()"><i class="fas fa-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-header font-weight-bold">
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-6">Features ({{ $product_features->count() }})</div>
                    <div class="col-6 text-right"><a class="btn btn-sm" data-toggle="modal" data-target="#modal3" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fas fa-plus"></i> Add</a></div>
                </div>
            </div>
            <div class="card-body" style="height: 400px; overflow-y: scroll;">
                @if ($product_features->count() == 0)
                No records.
                @else
                <table class="table table-hover" width="100%">
                    @foreach ($product_features as $product_feature)
                    <tr>
                        <td @if ($product_feature->highlight) class="font-weight-bold" @endif>{{ $product_feature->feature }} <a title="Edit" href="{{ route('products.product_features.edit', [$product->slug(), $product_feature->slug()]) }}" style="color: #{{ $site->getConfiguration()->colour1 }};"><i class="fas fa-edit"></i></a></td>
                        <td width="10%">
                            <form method="POST" action="{{ route('products.product_features.destroy', [$product->slug(), $product_feature->slug()]) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-link" style="padding: 0;" type="submit" title="Delete" onclick="return confirmDelete()"><i class="fas fa-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-header font-weight-bold">
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-6">Languages ({{ $product_languages->count() }})</div>
                    <div class="col-6 text-right"><a class="btn btn-sm" data-toggle="modal" data-target="#modal4" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fas fa-plus"></i> Add</a></div>
                </div>
            </div>
            <div class="card-body" style="height: 156px; overflow-y: scroll;">
                @if ($product_languages->count() == 0)
                No records.
                @else
                <table class="table table-hover" width="100%">
                    @foreach ($product_languages as $product_language)
                    <tr>
                        <td>{{ $product_language->language->name }}</td>
                        <td width="10%">
                            <form method="POST" action="{{ route('products.product_languages.destroy', [$product->slug(), $product_language->slug()]) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-link" style="padding: 0;" type="submit" title="Delete" onclick="return confirmDelete()"><i class="fas fa-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-header font-weight-bold">
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-6">Versions ({{ $product_versions->count() }})</div>
                    <div class="col-6 text-right"><a class="btn btn-sm" data-toggle="modal" data-target="#modal5" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fas fa-plus"></i> Add</a></div>
                </div>
            </div>
            <div class="card-body" style="height: 156px; overflow-y: scroll;">
                @if ($product_versions->count() == 0)
                No records.
                @else
                <table class="table table-hover" width="100%">
                    @foreach ($product_versions as $product_version)
                    <tr>
                        <td>{{ $product_version->version->name }}</td>
                        <td width="10%">
                            <form method="POST" action="{{ route('products.product_versions.destroy', [$product->slug(), $product_version->slug()]) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-link" style="padding: 0;" type="submit" title="Delete" onclick="return confirmDelete()"><i class="fas fa-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-header font-weight-bold">
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-6">Plans ({{ $product_plans->count() }})</div>
                    <div class="col-6 text-right"><a class="btn btn-sm" href="{{ route('products.product_plans.create', [$product->slug()]) }}" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fas fa-plus"></i> Add</a></div>
                </div>
            </div>
            <div class="card-body" style="height: 500px; overflow-y: scroll;">
                @if ($product_plans->count() == 0)
                No records.
                @else
                <table class="table table-hover" width="100%">
                    @foreach ($product_plans as $product_plan)
                    <tr class="table-secondary">
                        <td class="font-weight-bold">{{ $product_plan->name }} <a title="Edit" href="{{ route('products.product_plans.edit', [$product->slug(), $product_plan->slug()]) }}" style="color: #{{ $site->getConfiguration()->colour1 }};"><i class="fas fa-edit"></i></a></td>
                        <td width="10%">
                            <form method="POST" action="{{ route('products.product_plans.destroy', [$product->slug(), $product_plan->slug()]) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-link" style="padding: 0;" type="submit" title="Delete" onclick="return confirmDelete()"><i class="fas fa-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <small>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="font-weight-bold">Features</span><br />
                                        @foreach ($product_features as $product_feature)
                                            @if (in_array($product_feature->id, explode(',', $product_plan->features)))
                                                {{ $product_feature->feature }}<br />
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        @if ($product_plan->version_id != 0)
                                        <span class="font-weight-bold">Version</span><br />
                                        {{ App\DVersion::find($product_plan->version_id)->name }}<br /><br />
                                        @endif
                                        <span class="font-weight-bold">Plan Codes</span><br />
                                        @foreach($billing_intervals as $billing_interval)
                                            @if (App\DProductPlanCode::where('product_plan_id', $product_plan->id)->where('billing_interval_id', $billing_interval->id)->count() > 0)
                                                {{ $billing_interval->name }} - {{ App\DProductPlanCode::where('product_plan_id', $product_plan->id)->where('billing_interval_id', $billing_interval->id)->first()->code }}<br />
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </small>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-header font-weight-bold">
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-6">FAQ ({{ $product_faqs->count() }})</div>
                    <div class="col-6 text-right"><a class="btn btn-sm" data-toggle="modal" data-target="#modal6" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fas fa-plus"></i> Add</a></div>
                </div>
            </div>
            <div class="card-body" style="height: 500px; overflow-y: scroll;">
                @if ($product_plans->count() == 0)
                No records.
                @else
                <table class="table table-hover" width="100%">
                    @foreach ($product_faqs as $product_faq)
                    <tr class="table-secondary">
                        <td class="font-weight-bold">{{ $product_faq->question }}</td>
                        <td width="10%">
                            <form method="POST" action="{{ route('products.product_faqs.destroy', [$product->slug(), $product_faq->slug()]) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-link" style="padding: 0;" type="submit" title="Delete" onclick="return confirmDelete()"><i class="fas fa-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><span class="font-weight-bold">Answer:</span> {{ $product_faq->answer }}</td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Add Category</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::model(new App\DProductCategory, ['route' => ['products.product_categories.store', $product->slug()], 'class' => 'form-group']) !!}
                    @include('admin/product_categories/form', ['submit_text' => 'Add Category'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Add Requirement</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::model(new App\DProductRequirement, ['route' => ['products.product_requirements.store', $product->slug()], 'class' => 'form-group']) !!}
                    @include('admin/product_requirements/form', ['submit_text' => 'Add Requirement'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modal3title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Add Feature</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::model(new App\DProductFeature, ['route' => ['products.product_features.store', $product->slug()], 'class' => 'form-group']) !!}
                    @include('admin/product_features/form', ['submit_text' => 'Add Feature'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="modal4title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Add Language</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::model(new App\DProductLanguage, ['route' => ['products.product_languages.store', $product->slug()], 'class' => 'form-group']) !!}
                    @include('admin/product_languages/form', ['submit_text' => 'Add Language'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="modal5title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Add Version</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::model(new App\DProductVersion, ['route' => ['products.product_versions.store', $product->slug()], 'class' => 'form-group']) !!}
                    @include('admin/product_versions/form', ['submit_text' => 'Add Version'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="modal6title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Add FAQ</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::model(new App\DProductFaq, ['route' => ['products.product_faqs.store', $product->slug()], 'class' => 'form-group']) !!}
                    @include('admin/product_faqs/form', ['submit_text' => 'Add FAQ'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
