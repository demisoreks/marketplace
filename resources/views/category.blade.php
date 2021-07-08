@extends('app', ['page_title' => 'Home'])

@section('content')
<div class="row" style="background-image: url({{ $category->image_url }}); background-repeat: no-repeat; background-size: cover; padding: 100px 0;">
    <div class="col-lg-4 offset-lg-1 text-center text-lg-left" style="background-color: #fff; padding: 50px;">
        <h2 class="font-weight-bold" style="color: #{{ $site->getConfiguration()->colour1 }}; margin-bottom: 20px;">{{ $category->name }}</h2>
        <div id="slideIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @php
                    $count = 0;
                @endphp
                @foreach($site->getSliderProducts() as $key => $slider_product)
                <li data-target="#slideIndicators" data-slide-to="{{ $count }}" @if ($count == 0) class="active" @endif></li>
                @php
                    $count++;
                @endphp
                @endforeach
            </ol>
            <div class="carousel-inner">
                @php
                    $count = 0;
                @endphp
                @foreach($site->getSliderProducts() as $slider_product)
                @if ($products->contains('name', $slider_product->name))
                <div class="carousel-item @if ($count == 0) active @endif">
                    <h4 class="font-weight-bold">{{ $slider_product->name }}</h4>
                    <p>
                        {!! nl2br($slider_product->summary) !!}
                    </p>
                    <a href="{{ route('product', $slider_product->slug()) }}" class="btn btn-sm" style="background-color: transparent; color: #{{ $site->getConfiguration()->colour2 }}; border: 1px solid #{{ $site->getConfiguration()->colour2 }}; border-radius: 0;">Buy Now</a>
                </div>
                @php
                    $count++;
                @endphp
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 50px;">
    <div class="col-lg-10 offset-lg-1">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-6 col-lg-4 col-xl-3" style="margin-bottom: 20px;">
                <div style="background-color: #F8F8F8; padding: 20px;">
                    <div class="text-center" style="padding: 20px 0;">
                        {{ Html::image($product->logo_url, $product->name, ['height' => '100px']) }}
                    </div>
                    <div style="background: none; padding: 10px 0; border-top: 1px solid #{{ $site->getConfiguration()->colour1 }};">
                        <h5 class="font-weight-bold" style="color: #{{ $site->getConfiguration()->colour1 }};">{{ $product->name }}</h5>
                        <div class="input-group mb-3">
                            @php
                                $starts_at = "";
                                if ($product->starting_price > 0) {
                                    $starts_at = 'From &#x20A6;'.number_format($product->starting_price, 2);
                                }
                            @endphp
                            {!! Form::text('price', $value = $starts_at, ['class' => 'form-control', 'disabled' => true, 'aria-describedby' => 'product'.$product->id, 'style' => 'background-color: transparent; border: 1px solid #{{ $site->getConfiguration()->colour1 }}; color: #{{ $site->getConfiguration()->colour1 }}; border-radius: 0;']) !!}
                            <a class="input-group-text" id="{{ 'product'.$product->id }}" style="border-radius: 0; background-color: #{{ $site->getConfiguration()->colour1 }}; border: 1px solid #{{ $site->getConfiguration()->colour1 }}; color: #fff;" href="{{ route('product', $product->slug()) }}">BUY NOW</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
