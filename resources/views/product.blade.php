@extends('app', ['page_title' => $product->name])

@section('content')
<div class="row" style="margin: 50px 0;">
    <div class="col-lg-10 offset-lg-1">
        <div class="row">
            <div class="col-lg-8">
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
                    @if ($starting_price > 0)
                    <h4>Starting at &#x20A6;{{ number_format($starting_price, 2) }}</h4>
                    @endif
                    <a class="btn btn-lg" href="{{ route('plans', $product->slug()) }}" style="background-color: transparent; border: 1px solid #{{ $site->getConfiguration()->colour1 }}; color: #{{ $site->getConfiguration()->colour1 }}; border-radius: 0;">Buy Now</a>
                </div>
                <div class="card card-body" role="alert" style="margin-bottom: 20px;">
                    {!! nl2br($product->summary) !!}
                </div>
                <div style="margin-bottom: 20px;">
                    {!! $product->details !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div style="margin-bottom: 20px;">
                    <h5 class="font-weight-bold">Languages</h5>
                    <ul>
                        @foreach($product_languages as $product_language)
                            <li>{{ $product_language->language->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div style="margin-bottom: 20px;">
                    <h5 class="font-weight-bold">Requirements</h5>
                    <ul>
                        @foreach($product_requirements as $product_requirement)
                            <li>{{ $product_requirement->requirement }}</li>
                        @endforeach
                    </ul>
                </div>
                <div style="margin-bottom: 20px;">
                    <h5 class="font-weight-bold">Features</h5>
                    <ul>
                        @foreach($product_features as $product_feature)
                            @if ($product_feature->highlight)
                            <li>{{ $product_feature->feature }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div id="accordion-faq" style="margin-bottom: 20px;">
                    @php
                        $count = 0;
                    @endphp
                    @foreach($product_faqs as $product_faq)
                        <div class="card">
                            <div class="card-header bg-white text-dark" id="heading{{ $count }}" style="padding: 0;">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $count }}" aria-expanded="true" aria-controls="collapse{{ $count }}">
                                        <strong>{{ $product_faq->question }}</strong>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse{{ $count }}" class="collapse @if ($count == 0) show @endif" aria-labelledby="heading{{ $count }}" data-parent="#accordion-faq">
                                <div class="card-body">
                                    {{ $product_faq->answer }}
                                </div>
                            </div>
                        </div>
                        @php
                            $count ++;
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
