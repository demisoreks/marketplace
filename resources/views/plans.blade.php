@extends('app', ['page_title' => $product->name])

@section('content')
<div class="row" style="margin: 50px 0;">
    <div class="col-lg-10 offset-lg-1">
        <div class="row">
            <div class="col-12">
                <div style="margin-bottom: 20px;">
                    <div style="display: flex; align-items: center; height: 100%;">
                        {{ Html::image($product->logo_url, $product->name, ['height' => '50px', 'style' => 'display: inline;']) }}
                        <h1 class="font-weight-bold" style="color: #{{ $site->getConfiguration()->colour1 }}; display: inline;">&nbsp;{{ $product->name }}</h1>
                    </div>
                </div>
                <div style="margin-bottom: 20px;">
                    @php
                        $count = 0;
                    @endphp
                    @foreach($product_categories as $product_category)
                        @if ($count > 0)
                            ,
                        @endif
                        <a href="{{ route('category', $product_category->category->slug()) }}">{{ $product_category->category->name }}</a>
                        @php
                            $count ++;
                        @endphp
                    @endforeach
                    | Manufactured by <span class="font-weight-bold">{{ $product->vendor->name }}</span>
                </div>
                <div style="margin-bottom: 20px;">
                    <a href="{{ route('product', $product->slug()) }}"><i class="fa fa-arrow-left"></i> Go back to product details</a>
                </div>
                <div style="margin-bottom: 20px;">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach ($plan_details as $key => $plan_detail)
                                <a class="nav-item nav-link @if ($key == 0) active @endif" id="nav-{{ $key }}-tab" data-toggle="tab" href="#nav-{{ $key }}" role="tab" aria-controls="nav-{{ $key }}" aria-selected="@if ($key == 0) true @else false @endif">{{ $plan_detail['version']->name }}</a>
                            @endforeach
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tab-content" style="margin-top: 20px;">
                        @foreach($plan_details as $key => $plan_detail)
                            <div class="tab-pane fade @if ($key == 0) show active @endif" id="nav-{{ $key }}" role="tabpanel" aria-labelledby="nav-{{ $key }}-tab">
                                <div class="nav flex-column nav-pills float-left" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="width: 20%;">
                                    @foreach ($plan_detail['billing_intervals'] as $key2 => $billing_interval)
                                        <a class="nav-link @if ($key2 == 0) active @endif" id="v-pills-{{ $key.$key2 }}-tab" data-toggle="pill" href="#v-pills-{{ $key.$key2 }}" role="tab" aria-controls="v-pills-{{ $key.$key2 }}" aria-selected="@if ($key2 == 0) true @else false @endif">{{ $billing_interval->name }}</a>
                                    @endforeach
                                </div>
                                <div class="tab-content float-right" id="v-pills-tab-content" style="width: 80%; padding-left: 20px;">
                                    @foreach ($plan_detail['billing_intervals'] as $key2 => $billing_interval)
                                        <div class="tab-pane fade @if ($key2 == 0) show active @endif" id="v-pills-{{ $key.$key2 }}" role="tabpanel" aria-labelledby="v-pills-{{ $key.$key2 }}-tab">
                                            @if (count($billing_interval['plan_codes']) > 0)
                                                <table class="table table-bordered table-hover table-striped">
                                                    <tr>
                                                        <th width="30%" rowspan="2" class="text-center font-weight-bold">Features</th>
                                                        @foreach ($billing_interval['plan_codes'] as $product_plan_code)
                                                        <th class="text-center font-weight-bold">{{ $product_plan_code->productPlan->name }}</th>
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        @foreach ($billing_interval['plan_codes'] as $product_plan_code)
                                                        <td class="text-center">
                                                            @if ($product_plan_code->price)
                                                            <h5 class="font-weight-bold">&#x20A6;{{ number_format($product_plan_code->price, 2) }}</h5>
                                                            <a class="btn btn-sm" href="{{ route('cart.add', $product_plan_code->slug()) }}" style="background-color: transparent; border: 1px solid #{{ $site->getConfiguration()->colour1 }}; color: #{{ $site->getConfiguration()->colour1 }}; border-radius: 0;">Buy Now</a>
                                                            @endif
                                                        </td>
                                                        @endforeach
                                                    </tr>
                                                    @foreach($product_features as $key3 => $product_feature)
                                                    <tr>
                                                        <td>{{ $product_feature->feature }}</td>
                                                        @foreach ($billing_interval['plan_codes'] as $product_plan_code)
                                                        <td class="text-center font-weight-bold">@if (in_array($product_feature->id, explode(",", $product_plan_code->productPlan->features))) <i class="fa fa-check"></i> @endif</td>
                                                        @endforeach
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
